<?php

namespace app\modules\mng\controllers;

use app\modules\mng\models\Task;
use app\modules\mng\models\TaskSearch;
use GuzzleHttp\Exception\ClientException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
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
     * Lists all Task models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {


                $data =[
                    'frequency'    => $model->frequency,

                    'check_id'     => $model->id];

                $client = new \GuzzleHttp\Client([
                    'base_uri' =>  'http://127.0.0.1:8085/api/',
                ]);


                try {
                    $response = $client->request('GET', 'tester/azaza' , [
                        'headers' => ['worker-access-token' => \Yii::$app->params['worker-access-token']],
                        'query' => $data
                    ]);

                    $rows = json_decode((string)$response->getBody(), true);

                } catch (ClientException $e) {
                    return $e->getCode();
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
     * Updates an existing Task model.
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
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

       $model = $this->findModel($id);
        $data =[
            'remove_id'     => $model->id];

        $client = new \GuzzleHttp\Client([
            'base_uri' =>  'http://127.0.0.1:8085/api/',
        ]);


        try {
            $response = $client->request('GET', 'tester/azaza' , [
                'headers' => ['worker-access-token' => \Yii::$app->params['worker-access-token']],
                'query' => $data
            ]);

            $rows = json_decode((string)$response->getBody(), true);

        } catch (ClientException $e) {
            return $e->getCode();
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
