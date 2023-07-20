<?php


namespace app\controllers;

use app\models\PayokOrder;
use app\models\User;
use dektrium\user\models\Profile;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\rest\Controller;

/**
 * Class PayokController
 *
 * @package app\controllers
 */
class PayokController extends \yii\web\Controller
{

    public static function allowedDomains()
    {
        return [
             '*',                        // star allows all domains
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionSuccess()
    {
        if ($this->request->isPost) {

            $secret = \Yii::$app->params['payok_key'];


            if (!empty($_POST)) {
                $post = \Yii::$app->request->post();
            } else {
                $post = json_decode(\Yii::$app->request->getRawBody(), true);
            }
            \Yii::info("POST REQUEST HERE");
            \Yii::info($post);
            $array = [

                $secret,
                $desc = $post['desc'],
                $currency = $post['currency'],
                $shop = $post['shop'],
                $payment_id = $post['payment_id'],
                $amount = $post['amount'],

            ];


            $sign = md5(implode('|', $array));

            if ($sign != $post['sign']) {
                \Yii::info("SIGN NOT VALID");
                die('Подпись не совпадает.');
            }

            $record = PayokOrder::findOne($payment_id);
            if (!$record) {
                die('Не найдено');
            }
            $record->status = 1;
            if (isset($post['underpayment']) && $post['underpayment'] === 1) {
                $record->status = 2;
            }

            $record->save(false);
            if (isset($post['custom']['user_id'])) {
                $profile = Profile::find()->where(['user_id' => intval($post['custom']['user_id'])])->one();
                if ($profile && isset($post['profit'])) {
                    $profile->credit = $profile->credit + $post['profit'];
                    $profile->save(false);
                }
            }

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            \Yii::$app->response->statusCode = 200;
            return [
                'success',
            ];
        }
    }

    public function actionIndex()
    {
        \Yii::$app->getSession()->setFlash('success', "Платеж прошел");
        return $this->redirect( Url::toRoute(['profile/view', 'user_id' => \Yii::$app->user->getId()]));
    }


    public function actionFailure()
    {
        \Yii::$app->getSession()->setFlash('danger', "Платеж не прошел");
        return $this->redirect( Url::toRoute(['profile/view', 'user_id' => \Yii::$app->user->getId()]));
    }

}