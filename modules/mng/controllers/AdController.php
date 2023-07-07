<?php


namespace app\modules\mng\controllers;

use app\models\Ad;
use app\models\AdSearch;
use app\models\Profile;
use yii\web\ForbiddenHttpException;
use Yii;
use app\models\Userform;
use yii\web\NotFoundHttpException;

/**
 * Class AdController
 * @package app\modules\mng\controllers
 */
class AdController extends \yii\web\Controller
{
    public function actionCreateAd($userform_id)
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("Not Allowed");
        }
        $model = new Ad();

        if ($this->request->isPost && $model->load($this->request->post())) {
            $userform = Userform::findOne($userform_id);
            $p = $this->request->post();
            $model->user_id = $userform->user_id;

            $model->city_id = intval(Yii::$app->request->getBodyParams()['Ad']['city_id']);
            $model->sex = $model->getProfileAttribute('sex') ? $model->getProfileAttribute('sex') : 0;
            $model->age = Profile::getAgeFromBirth($model->getProfileAttribute('birthday'));
            if($model->save(false)) {
                Yii::$app->getSession()->setFlash('success', 'Successfully created');
                return $this->redirect(['userform/view', 'id' => $userform_id]);
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


}