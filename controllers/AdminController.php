<?php


namespace app\controllers;

use app\models\Ad;
use app\models\AdminAdSearch;
use app\models\AdSearch;
use app\models\AdsManager;
use app\models\Profile;
use dmstr\web\AdminLteAsset;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use Yii;

/**
 * Class AdminController
 * @package app\controllers
 */
class AdminController extends \yii\web\Controller
{



    /**
     * Creates a new Ad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        if(!Yii::$app->user->can('administrator')){
            throw new ForbiddenHttpException('Not Allowed');
        }
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("Not Allowed");
        }
        $model = new Ad();

        if ($this->request->isPost) {
            $model->user_id = Yii::$app->user->id;
            if ($model->load($this->request->post())) {
                $model->city_id = intval(Yii::$app->request->getBodyParams()['Ad']['city_id']);
                //$model->sex = $model->getProfileAttribute('sex') ? $model->getProfileAttribute('sex') : 0;
                //$model->age = Profile::getAgeFromBirth($model->getProfileAttribute('birthday'));
                $model->save(false);
                Yii::$app->getSession()->setFlash('success', 'Successfully created');
                return $this->redirect(['index']);
            } else {
                foreach ($model->getErrors() as $error) {
                    Yii::$app->getSession()->setFlash('danger', $error);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function beforeAction($action)
    {
        $this->layout = "//admin";
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    /**
     * Updates an existing Ad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("Not Allowed");
        }
        $model = $this->findModel($id);
        if ($model->user_id != Yii::$app->user->id && !Yii::$app->user->can('administrator')) {
            throw new ForbiddenHttpException("This action is not allowed");
        }
        $date              = new \DateTime("now", new \DateTimeZone('Europe/Amsterdam'));
        $date              = $date->format('Y-m-d H:i:s');
        $model->updated_at = $date;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->city_id = intval(Yii::$app->request->getBodyParams()['Ad']['city_id']);
            $model->save(false);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionView($id)
    {
      // var_dump(Yii::$app->user->can('administrator'));
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("Not Allowed");
        }
        $model = $this->findModel($id);
        $model->city_name = isset(Profile::$city_list[$model->city_id]) ? Profile::$city_list[$model->city_id] : null;
        $model->status_name = isset(Ad::getStatusList()[$model->status]) ? Ad::getStatusList()[$model->status] : ' ';
        if ($model->user_id != Yii::$app->user->id && !Yii::$app->user->can('administrator') ) {
            throw new ForbiddenHttpException("This action is not allowed");
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->can('administrator')){
            throw new ForbiddenHttpException('Not Allowed');
        }
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("Not Allowed");
        }
        $model = $this->findModel($id);
        if ($model->user_id != Yii::$app->user->id && !Yii::$app->user->can('administrator')){
            throw new ForbiddenHttpException("This action is not allowed");
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Ad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ad::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    /**
     * Lists all Ad models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->can('administrator')){
            throw new ForbiddenHttpException('Not Allowed');
        }
        $searchModel  = new AdminAdSearch();
        $manager      = new AdsManager($searchModel);
        $dataProvider = $manager->getAll($this->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


}