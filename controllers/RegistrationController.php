<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\controllers;

use app\assets\JQAsset;
use dektrium\user\controllers\RegistrationController as BaseRegistrationController;
use dektrium\user\models\RegistrationForm;
use yii\web\NotFoundHttpException;
use app\models\Ad;
use app\models\User;
use app\models\Userform;
use Yii;


/**
 * RegistrationController is responsible for all registration process, which includes registration of a new account,
 * resending confirmation tokens, email confirmation and registration via social networks.
 *
 * @property \dektrium\user\Module $module
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RegistrationController extends BaseRegistrationController
{
    public $layout = '//main';

    public $validation_key = 'asdas5fdwer38iyeuit4ueh';

    public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationForm $model */
        $model = \Yii::createObject(RegistrationForm::className());
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->request->post()) && $model->register()) {
            $params = Yii::$app->request->getBodyParams()["register-form"];
            $this->trigger(self::EVENT_AFTER_REGISTER, $event);
            $ad = new Ad();
            $ad->title = $model->ad_title;
            $user = User::find()->where(['username' => $model->username])->one();
            $ad->description = $model->ad_description;
            $ad->user_id = $user->id;
            $ad->city_id = $model->ad_city_id;
            $ad->type = $model->ad_type;
            $ad->save(false);


            $userform = new Userform();
            $userform->sex = $params["uf_sex"];
            $userform->partner_sex = $params['uf_partner_sex'];
            $userform->partner_age_min = $params['uf_partner_age_min'];
            $userform->partner_age_max = $params['uf_partner_age_max'];
            $userform->meeting_purpose =  json_encode($params["uf_meeting_purpose"], 1);
            $userform->phone = $params['uf_partner_phone'];
            $userform->vk_link = $params['uf_vk_link'];
            $userform->user_id = $user->id;
            $userform->city_id = $params['ad_city_id'];
            $userform->first_name = $user->username;

            $userform->save(false);
           // \Yii::$app->session->setFlash('success', 'Проверьте папку со спамом: письмо могло попасть туда');
            return $this->refresh();


        }
        return $this->render('register', [
            'model'  => $model,
            'module' => $this->module,
        ]);

    }
}
