<?php

namespace app\controllers;

use alexander777hub\crop\models\PhotoEntity;
use app\models\CommentSearch;
use app\models\Profile;
use app\models\Userform;
use app\models\UserformManager;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use Yii;

class AncetController extends \yii\web\Controller
{
    public function actionUpdate($id)
    {


        $model = Userform::findOne($id);
        // $r = Yii::$app->request->getBodyParams()['Userform'];
        if( $model->status != 0){
            throw new NotFoundHttpException("Not Found");
        }

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
            $file = Yii::$app->request->getBodyParams()['Userform']['photo'];
            if($file != '/uploads/photo/default.png'){
                $photo = new PhotoEntity();
                $url = $photo->movePhoto($file);
                if ($url){
                    $photo_id =  Yii::$app->request->getBodyParams()['Userform']['photo_id'];
                    $old_model = PhotoEntity::findOne(intval($photo_id));
                    if($old_model){
                        $old_model->url = $url;
                        $old_model->save(false);
                    } else {
                        $photo->bind_obj_id = $model->id;
                        $photo->url = $url;
                        $photo->type = 7;
                        if(!$photo->save()){
                            foreach($photo->getErrors() as $error){
                                Yii::$app->getSession()->setFlash('danger', $error);
                            }
                        }

                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model = UserformManager::getOne($model);
        $model->target = Json::decode($model->target);
        /* $model->meeting_purpose = Json::decode($model->meeting_purpose); */
        return $this->render('update', [
            'model' => $model,
        ]);
        return $this->render('index');
    }
    public function actionAssignAvatar($photo_id)
    {
        $model = PhotoEntity::findOne(intval($photo_id));
        $userform = Userform::find()->where(['id' =>$model->bind_obj_id])->one();
        $userform->avatar_id = $model->id;
        $userform->save(false);
        Yii::$app->getSession()->setFlash('success', "Аватар назначен");
        return $this->redirect(['/']);
    }
    public function actionRemovePhoto($photo_id)
    {
        $model = PhotoEntity::findOne(intval($photo_id));
        $userform = Userform::find()->where(['id' =>$model->bind_obj_id])->one();
        if($userform->avatar_id == intval($photo_id)){
            $userform->avatar_id = null;
        }
        $userform->save(false);
        $model->delete();

        Yii::$app->getSession()->setFlash('success', "Фото удалено");

        return $this->redirect(['/']);
    }

    /**
     * Displays a single Userform model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!$id){
          $id =  $this->actionCreateIfNotExist();
        }
        $model_userform = Userform::findOne($id);
        $model_userform = UserformManager::getOne($model_userform);

        if( $model_userform->user_id != \Yii::$app->user->id){
            throw new NotFoundHttpException("Not Found");
        }
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['userform_id' => $model_userform->id]);
        $q = $dataProvider->query->createCommand()->getRawSql();

        foreach ($dataProvider->getModels() as $model_comment) {
            //$model_comment->text = nl2br($model_comment->text);
            if (Profile::findOne($model_comment->user_id)) {
                $model_comment->user_name = Profile::findOne($model_comment->user_id)->name ? Profile::findOne($model_comment->user_id)->name : $model_comment->user_id;
            }
        }
        return $this->render('view', [
            'model_userform' => $model_userform,
            //'comments' => $comments,
            'dataProvider'   => $dataProvider,

        ]);
    }
    public  static function actionCreateIfNotExist()
    {
        $ancet = new Userform();
        $ancet->user_id = \Yii::$app->user->id;
        $ancet->save(false);
        $id =$ancet->id;
        return $id;

    }



}
