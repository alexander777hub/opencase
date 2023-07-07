<?php

namespace app\controllers;

use Yii;
use app\models\AdSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use app\models\Profile;
use yii\web\ForbiddenHttpException;

class CabinetController extends \yii\web\Controller
{

    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("Not Allowed");
        }
        $searchModel = new AdSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['ad.user_id' => \Yii::$app->user->id]);
       /* foreach ($dataProvider->getModels() as &$model) {
            $model->link     = Profile::find()->where(['user_id' => $model->user_id])->one()->vk_link;
            $model->username = Profile::find()->where(['user_id' => $model->user_id])->one()->name;
            $model->city_name = isset(Profile::$city_list[$model->city_id]) ? Profile::$city_list[$model->city_id] : null;
        } */
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        return $this->redirect(['ad/create']);
    }

    public function actionView($id)
    {

      return $this->redirect( Url::toRoute(['ad/view', 'id' => $id]));
    }

    public function actionUpdate($id)
    {

        return $this->redirect( Url::toRoute(['ad/update', 'id' => $id]));
    }

    public function actionDelete($id)
    {

        return $this->redirect( Url::toRoute(['ad/delete', 'id' => $id]));
    }

    public function actionUploadProfilePicture($id)
    {
        $model = Profile::findOne($id);
        $oldFile = $model->getProfilePictureFile();
        $oldProfilePic = $model->photo;

        if ($model->load(Yii::$app->request->post())) {

            // process uploaded image file instance
            $image = $model->uploadProfilePicture();

            if($image === false && !empty($oldProfilePic)) {
                $model->photo = $oldProfilePic;
            }

            if ($model->validate()) {
                // upload only if valid uploaded file instance found
                if ($image !== false) { // delete old and overwrite
                    if(!empty($oldFile) && file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                    $path = $model->getProfilePictureFile();
                    $image->saveAs($path);
                }
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $model->getProfilePictureUrl();
            }
        }
        return '{}';
    }

}
