<?php

namespace app\controllers;

use app\models\Ad;
use app\models\AdSearch;
use app\models\Profile;
use app\models\Userform;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * AdController implements the CRUD actions for Ad model.
 */
class AdController extends Controller
{


    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['logout'],
                    /*'rules' => [
                        [
                            'actions' => ['create', 'update', 'delete'],
                            'allow' => false,
                            'roles' => ['?'],
                        ],
                    ], */
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Ad models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdSearch();
       /* if((!Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) && !Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) &&   !Yii::$app->user->can(Profile::ROLE_MANAGER))){
            throw new ForbiddenHttpException("This action is not allowed");
        } */

        $dataProvider = $searchModel->search($this->request->queryParams);

        /*foreach ($dataProvider->getModels() as &$model) {
            $model->link     = Profile::find()->where(['user_id' => $model->user_id])->one() ? Profile::find()->where(['user_id' => $model->user_id])->one()->vk_link : null;
            $model->username = Profile::find()->where(['user_id' => $model->user_id])->one() ? Profile::find()->where(['user_id' => $model->user_id])->one()->name : null;
            $model->city_name = isset(Profile::$city_list[$model->city_id]) ? Profile::$city_list[$model->city_id] : null;
        } */
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ad model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);
        if ($model->user_id != Yii::$app->user->id) {
            if((!Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) && !Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) &&   !Yii::$app->user->can(Profile::ROLE_MANAGER))){
                throw new ForbiddenHttpException("This action is not allowed");
            }

        }
        $model->status_name = isset(Ad::getStatusList()[$model->status]) ? Ad::getStatusList()[$model->status] : ' ';
        $model->type_name = $model->type && isset(Ad::getTypeList()[$model->type]) ? Ad::getTypeList()[$model->type] : "Не задано";
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Ad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("Not Allowed");
        }
        $model = new Ad();

        if ($this->request->isPost) {
            $p = $this->request->post();

            $userform = Userform::find()->where(['user_id' =>Yii::$app->user->id])->one();
            if(!$userform){
                 Yii::$app->getSession()->setFlash('danger', 'Сначала создайте анкету');
                  return $this->refresh();
            }
            $model->user_id = Yii::$app->user->id;
            if ($model->load($this->request->post())) {
                $model->city_id = intval(Yii::$app->request->getBodyParams()['Ad']['city_id']);
                $model->sex = $userform->sex ? $userform->sex : "Не задано";
                $model->save(false);
                Yii::$app->getSession()->setFlash('success', 'Successfully created');
                return $this->redirect(['site/index']);
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



    /**
     * Updates an existing Ad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->user_id != Yii::$app->user->id) {

            if((!Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) && !Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) &&   !Yii::$app->user->can(Profile::ROLE_MANAGER))){
                throw new ForbiddenHttpException("This action is not allowed");
            }

        }
        $model->city_name = isset(Profile::$city_list[$model->city_id]) ? Profile::$city_list[$model->city_id] : null;

        $date              = new \DateTime("now", new \DateTimeZone('Europe/Amsterdam'));
        $date              = $date->format('Y-m-d H:i:s');
        $model->updated_at = $date;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $r =  Yii::$app->request->getBodyParams()['Ad']['city_id'];;
            $model->city_id = intval(Yii::$app->request->getBodyParams()['Ad']['city_id']);
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
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
        $model = $this->findModel($id);
        if ($model->user_id != Yii::$app->user->id) {
            if((!Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) && !Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) &&   !Yii::$app->user->can(Profile::ROLE_MANAGER))){
                throw new ForbiddenHttpException("This action is not allowed");
            }

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
}
