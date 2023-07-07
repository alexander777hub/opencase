<?php

namespace app\controllers;

use app\assets\JQAsset;
use app\models\Client;
use app\models\Influencer;
use app\models\InfluencerSearch;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\JqueryAsset;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * InfluencerController implements the CRUD actions for Influencer model.
 */
class InfluencerController extends Controller

{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
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
     * Lists all Influencer models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InfluencerSearch();

        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['user_id'=> Yii::$app->user->identity->getId()]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTopRated()
    {
        $client = new Client();
        $response = $client->getToprated();
        $res = Yii::$app->cache->get("top_records");
        if (empty($res)) {
            $res = Yii::$app->cache->add("top_records", json_decode((string)$response->getBody(), true)
                , 21600);
        }
        $data = Yii::$app->cache->get("top_records")["results"];
        JQAsset::register($this->view);
        return $this->render('top_rated', [
            'data' => $data,
        ]);
    }
    /**
     * Displays a single Influencer model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $id = intval($id);
        $client = new \GuzzleHttp\Client([

            'base_uri' => \Yii::$app->params['api_url'],
        ]);

        $response = $client->request('GET', 'api/v1/influencers/' . $id , [
            'headers' =>
                ['Content-Type' => 'application/json',
                 'Accept' => 'application/json',
                 'X-CSRF-Token'=> 'MT9KYG2XOjczdR4QL4oJ1FQ1YtJ5F6zSKxjQjaV599mWIi3sGmX0lt0QDPx2xlO9',
                 'Authorization' => 'Bearer ' . Yii::$app->cache->get('token'),
                ],
        ]);
        $res = json_decode((string)$response->getBody(), true);
        JQAsset::register($this->view);
        return $this->render('view', [
            'model' => $res,
        ]);
    }

    public function updateRecords(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->getMethod() == 'POST'){
            $data = json_decode((string)Yii::$app->request->getBodyParams(), true);
            $res = [];
            if(!empty($data)){
                foreach($data as $item){
                    if(Influencer::find()->where(['id' => $item['id']])
                        ->one()) {
                        $this->actionDelete($item['id']);
                        $model = new Influencer();
                        try {
                            if(!$model->load($item) || !$model->save()){
                                $res['id']  = $model->getErrors();
                            }
                        } catch (\Exception $e)
                        {
                            $res[$item['id']]['error'] = $e->getMessage();

                        }
                    }
                }
                if (empty(['res'])){
                    $res['status'] = 'ok';
                }
                return $res;
            }
        } else {
            throw new MethodNotAllowedHttpException("Method not Allowed");
        }
    }

    /**
     * Creates a new Influencer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Influencer();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($this->request->isPost) {
            $params = Yii::$app->request->getBodyParams();
            if (isset($params['id'])) {
              echo "HERE";
                $client = new \GuzzleHttp\Client([

                    'base_uri' => \Yii::$app->params['api_url'],
                ]);


                $response = $client->request('GET', 'api/v1/influencers/' . intval($params['id']) , [
                    'headers' =>
                        ['Content-Type' => 'application/json',
                         'Accept' => 'application/json',
                         'X-CSRF-Token'=> 'MT9KYG2XOjczdR4QL4oJ1FQ1YtJ5F6zSKxjQjaV599mWIi3sGmX0lt0QDPx2xlO9',
                         'Authorization' => 'Bearer ' . Yii::$app->cache->get('token'),
                        ],
                ]);
                $res = json_decode((string)$response->getBody(), true);
                $model->user_id = Yii::$app->user->identity->getId();

                if ($model->load($res) && $model->save()) {
                     return [
                         'status' => "ok",
                     ];
                } else {
                    throw new BadRequestHttpException($model->getErrors());
                }
                return $res;
            } else {
                throw new BadRequestHttpException("Bad Request");
            }

            /*if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } */
        } else {
            throw new MethodNotAllowedHttpException("Metod not allowed");
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Influencer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Influencer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Influencer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Influencer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Influencer::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
