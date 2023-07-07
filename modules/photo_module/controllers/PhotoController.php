<?php

namespace app\modules\photo_module\controllers;

use app\models\Photo;
use app\models\PhotoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Userform;
use yii\web\UploadedFile;
use Yii;

/**
 * PhotoController implements the CRUD actions for Photo model.
 */
class PhotoController extends Controller
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
     * Lists all Photo models.
     *
     * @return string
     */
    public function actionIndex($id)
    {
        $searchModel = new PhotoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['userform_id' => $id]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Photo model.
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
     * Creates a new Photo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $userform = Userform::findOne($id);
        $old_files = $userform->getPhotos()->asArray()->all();
        $model = new Photo();


        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $image = $model->uploadProfilePicture();
            $model->userform_id = $userform->id;
            if ($model->validate()) {
                // upload only if valid uploaded file instance found
                if ($image !== false) { // delete old and overwrite
                    $path               = $model->getProfilePictureFile();

                    $model->save();
                    $image->saveAs($path);
                }
                return $this->redirect(['index',
                                        'id' => $id,
                ]);
                //  \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                //  return $model->getProfilePictureUrl();
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Photo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldFile = $model->getProfilePictureFile();
        $oldPic = $model->link;
        if ($model->load($this->request->post())) {
            $image = $model->uploadProfilePicture();
            if($image === false && !empty($oldPic)) {
                $model->link = $oldPic;
            }
            if ($model->validate()) {
                // upload only if valid uploaded file instance found
                if ($image !== false) {
                    if(!empty($oldFile) && file_exists($oldFile)) {
                        unlink($oldFile);
                    } // delete old and overwrite
                    $path               = $model->getProfilePictureFile();
                    $new_link = explode("/photo/", $path)[1];
                    $model->link = $new_link;
                    $image->saveAs($path);
                }
                $model->save(false);
                return $this->redirect(["photo/index", 'id' => $model->userform_id]);
                //  \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                //  return $model->getProfilePictureUrl();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Photo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $userform_id)
    {
        $userform = Userform::findOne($userform_id);
        if ($userform->avatar_id == $id){
            $userform->avatar_id = null;
            $userform->save(false);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'id' => $userform_id]);
    }

    public function actionAssignAvatar($id)
    {
        $model = Photo::findOne($id);
        $userform = Userform::find()->where(['id' =>$model->userform_id])->one();
        $userform->avatar_id = $model->id;
        $userform->save(false);

        return $this->redirect(['index', 'id' => $userform->id]);
    }

    /**
     * Finds the Photo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Photo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Photo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
