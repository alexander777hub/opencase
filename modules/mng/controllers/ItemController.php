<?php

namespace app\modules\mng\controllers;

use alexander777hub\crop\models\PhotoEntity;
use app\controllers\ManagerController;
use app\models\Item;
use app\models\ItemSearch;
use app\modules\mng\models\ItemPhotoEntity;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends ManagerController
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
     * Lists all Item models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
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
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Item();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
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
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $r = \Yii::$app->request->getBodyParams();
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if(isset(\Yii::$app->request->getBodyParams()['Item']['photo'])){
                $file = \Yii::$app->request->getBodyParams()['Item']['photo'];
                if($file != '/uploads/photo/default.png'){
                    $photo = new ItemPhotoEntity();
                    $url = $photo->movePhoto($file);
                    if ($url){
                        $photo_id =  \Yii::$app->request->getBodyParams()['Item']['photo_id'];
                        $old_model = ItemPhotoEntity::findOne(intval($photo_id));
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
                    $model->icon = $photo->url;
                    $model->save(false);
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Item model.
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
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionAssignAvatar($photo_id)
    {
        $model = ItemPhotoEntity::findOne(intval($photo_id));
        $item = Item::find()->where(['id' =>$model->bind_obj_id])->one();
        $item->icon = $model->url;
        $item->save(false);
        \Yii::$app->getSession()->setFlash('success', "Аватар назначен");
        return $this->redirect(['index']);
    }
    public function actionRemovePhoto($photo_id)
    {
        $model = ItemPhotoEntity::findOne(intval($photo_id));
        $userform = Item::find()->where(['id' =>$model->bind_obj_id])->one();
        $userform->icon = null;
        $userform->save(false);

        $model->delete();
        \Yii::$app->getSession()->setFlash('success', "Фото удалено");
        return $this->redirect(['index']);
    }
}
