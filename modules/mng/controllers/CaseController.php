<?php

namespace app\modules\mng\controllers;

use alexander777hub\crop\models\PhotoEntity;
use app\models\Userform;
use app\modules\mng\models\Opening;
use app\modules\mng\models\OpeningSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CaseController implements the CRUD actions for Opening model.
 */
class CaseController extends Controller
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
     * Lists all Opening models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OpeningSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Opening model.
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
     * Creates a new Opening model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Opening();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $model->addUser();
                $model->addItem();
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
     * Updates an existing Opening model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $file = \Yii::$app->request->getBodyParams()['Opening']['photo'];
            $model->addUser();
            $model->addItem();
            if($file != '/uploads/photo/default.png'){
                $photo = new PhotoEntity();
                $url = $photo->movePhoto($file);
                if ($url){
                    $photo_id =  \Yii::$app->request->getBodyParams()['Opening']['photo_id'];
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
                                \Yii::$app->getSession()->setFlash('danger', $error);
                            }
                        }

                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Opening model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);


        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Opening model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Opening the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Opening::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAssignAvatar($photo_id)
    {
        $model = PhotoEntity::findOne(intval($photo_id));
        $userform = Opening::find()->where(['id' =>$model->bind_obj_id])->one();
        $userform->avatar_id = $model->id;
        $userform->save(false);
        \Yii::$app->getSession()->setFlash('success', "Аватар назначен");
        return $this->redirect(['index']);
    }
    public function actionRemovePhoto($photo_id)
    {
        $model = PhotoEntity::findOne(intval($photo_id));
        $userform = Opening::find()->where(['id' =>$model->bind_obj_id])->one();
        if($userform->avatar_id == intval($photo_id)){
            $userform->avatar_id = null;
        }
        $userform->save(false);
        $model->delete();
        \Yii::$app->getSession()->setFlash('success', "Фото удалено");
        return $this->redirect(['index']);
    }

}
