<?php

namespace app\controllers;

use app\models\ItemSearch;
use app\models\Profile;
use app\models\ProfileSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
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
                    'only' => ['view', 'update', 'delete', 'create', 'index'],

                    'rules' => [
                        [
                            'actions' => ['view'],
                            'allow' => true,
                            'roles' => ['@'],

                        ],
                    ],
                    'denyCallback' => function ($rule, $action) {
                        $this->redirect([ '/' ]);
                        return null;
                    }

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
     * Lists all Profile models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param int $user_id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($user_id)
    {
        $model = $this->findModel($user_id);
        /*$query = (new \yii\db\Query())->select(['item_id'])->from('opening_item')->where(['user_id' => \Yii::$app->user->id]);
        $raw = $query->createCommand()->getRawSql();
        $command = $query->createCommand();
        $data = $command->queryAll();
        $ids = [];
        if(!empty($data)){
            foreach ($data as $key => $item){
                $ids[ intval($item['item_id'])] = intval($item['item_id']);
            }
        } */
        $query = (new \yii\db\Query())->select(['item.id', 'item.market_hash_name', 'item.type', 'item.icon_url', 'opening_item.price', 'opening_item.id as oi_id', 'opening_item.status as status',  'item.rarity', 'item.exterior'])->from('item')->innerJoin('opening_item', 'item.id = opening_item.item_id')->where(['opening_item.user_id'=> \Yii::$app->user->id])->orderBy(["opening_item.id" => SORT_DESC]);

        $raw = $query->createCommand()->getRawSql();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 150,
            ],
        ]);

        return $this->render('view', [
            'model' => $this->findModel($user_id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Profile();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'user_id' => $model->user_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $user_id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($user_id)
    {
        $model = $this->findModel($user_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionTrade()
    {
        $model = Profile::findOne(\Yii::$app->request->post('Profile')['user_id']);
        $model->trade_link = \Yii::$app->request->post('Profile')['trade_link'];
        if ($model->validate() && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id]
            );
        }
        $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $user_id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($user_id)
    {
        $this->findModel($user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $user_id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id)
    {
        if (($model = Profile::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
