<?php

namespace app\controllers;

use app\models\Ad;
use app\models\Comment;
use app\models\CommentSearch;
use app\models\Photo;
use app\models\User;
use app\models\Userform;
use app\models\UserformManager;
use app\models\UserformSearch;
use http\Url;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use app\models\Profile;

/**
 * UserformController implements the CRUD actions for Userform model.
 */
class UserformController extends Controller
{



    /**
     * Lists all Userform models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserformSearch();
        $manager      = new UserformManager($searchModel);
        if (Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) || Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR)) {
            $dataProvider = $manager->getAll($this->request->queryParams);
        }
        if (Yii::$app->user->can(Profile::ROLE_MANAGER)) {
            $dataProvider = $searchModel->search($this->request->queryParams);
            $dataProvider->query->andWhere(['user_id' => \Yii::$app->user->id]);
            foreach ($dataProvider->getModels() as &$model) {
                $model->city_name       = isset(Profile::$city_list[$model->city_id]) ? Profile::$city_list[$model->city_id] : null;
                $model->sexname         = isset(Profile::$sex_list[$model->sex]) ? Profile::$sex_list[$model->sex] : null;
                $model->relocate_status = isset(Userform::getRelocateStatus()[$model->ready_to_relocate]) ? Userform::getRelocateStatus()[$model->ready_to_relocate] : null;
               // $model->target_name     = isset(Userform::getTargets()[$model->target]) ? Userform::getTargets()[$model->target] : null;
                $model->find_zone_name  = isset(Userform::getFindZone()[$model->find_zone]) ? Userform::getFindZone()[$model->find_zone] : null;
                if (!empty($model->target)) {
                    $target_names = [];
                    $arr          = Json::decode($model->target);
                    if (is_int($arr)) {
                        $model->target_name = Userform::getTargets()[intval($arr)];
                    } else {
                        foreach ($arr as $item) {
                            $target_names[] = Userform::getTargets()[intval($item)];
                        }
                        $model->target_name = implode(',', $target_names);
                    }
                }
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userform model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        \yii\helpers\Url::remember();
        $model_userform = $this->findModel($id);
        $model_userform = UserformManager::getOne($model_userform);
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['userform_id'=> $model_userform->id]);
        $q = $dataProvider->query->createCommand()->getRawSql();

         foreach ($dataProvider->getModels() as $model_comment){
             //$model_comment->text = nl2br($model_comment->text);
             if(Profile::findOne($model_comment->user_id)){
                 $model_comment->user_name = Profile::findOne($model_comment->user_id)->name ? Profile::findOne($model_comment->user_id)->name : $model_comment->user_id;
             }
         }
        return $this->render('view', [
            'model_userform' => $model_userform,
            //'comments' => $comments,
            'dataProvider' => $dataProvider,

        ]);
    }
    public function actionDemo($hash)
    {
        $id = Yii::$app->redis->get($hash);
        if($id){
            \yii\helpers\Url::remember();
            $model_userform = $this->findModel($id);
            $model_userform = UserformManager::getOne($model_userform);
            $searchModel = new CommentSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
            $dataProvider->query->andWhere(['userform_id'=> $model_userform->id]);
            $q = $dataProvider->query->createCommand()->getRawSql();


            return $this->render('view', [
                'model_userform' => $model_userform,
                //'comments' => $comments,
               // 'dataProvider' => $dataProvider,

            ]);

        } else {
            throw new NotFoundHttpException("Not found");
        }

    }


    /**
     * Creates a new Userform model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Userform();

        if ($this->request->isPost) {
           // $json = $this->request->post()['Userform']['target'];
           // $json =
            $model->user_id = Yii::$app->user->id;
            if ($model->load($this->request->post())) {
                //var_dump(Yii::$app->request->getBodyParams()['Userform']['target']);
               // exit;
                $model->target = json_encode(Yii::$app->request->getBodyParams()['Userform']['target'], 1);
                /*$model->meeting_purpose = json_encode( Yii::$app->request->getBodyParams()['Userform']['meeting_purpose'], 1);
                $model->partner_sex = intval(Yii::$app->request->getBodyParams()['Userform']['partner_sex']);
                $model->partner_age = intval(Yii::$app->request->getBodyParams()['Userform']['partner_age']); */
                if (!$model->save()){
                    foreach ($model->getErrors() as $error) {
                        Yii::$app->getSession()->setFlash('danger', $error);
                    }
                    return $this->refresh();
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Userform model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        //parent::actionUpdate($id);
        $model = $this->findModel($id);
       // $r = Yii::$app->request->getBodyParams()['Userform'];

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->target = json_encode(Yii::$app->request->getBodyParams()['Userform']['target'], 1);
           /* $model->meeting_purpose = json_encode( Yii::$app->request->getBodyParams()['Userform']['meeting_purpose'], 1);
            $model->partner_sex = intval(Yii::$app->request->getBodyParams()['Userform']['partner_sex']);
            $model->partner_age = intval(Yii::$app->request->getBodyParams()['Userform']['partner_age']); */
            if (!$model->save()){
                foreach ($model->getErrors() as $error) {
                    Yii::$app->getSession()->setFlash('danger', $error);
                }
                return $this->refresh();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model = UserformManager::getOne($model);
        $model->target = Json::decode($model->target);
       /* $model->meeting_purpose = Json::decode($model->meeting_purpose); */
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Userform model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //parent::actionDelete($id);
        $model = $this->findModel($id);
        $photos = $model->getPhotos()->all();
        if($photos){

            foreach ($photos as $photo){
                $file = $photo->url;

                if(!empty($file) && file_exists( Yii::getAlias('@webroot') . $file)) {
                    unlink(Yii::getAlias('@webroot') . $file);
                }
                $photo->delete();
            }
        }


        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionRemoveComment($id, $userform_id)
    {
        $comment = Comment::findOne($id);
        $comment->delete();

        return  $this->redirect(['/userform/view', 'id'=> $userform_id]);
    }

    /**
     * Finds the Userform model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Userform the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userform::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
