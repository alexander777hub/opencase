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
            $secret = \Yii::$app->params['payok_key']; // Ваш секретный ключ
            if(!empty( \Yii::$app->request->post())){
                $post = \Yii::$app->request->post();
            } else {
                $post =  Json::decode(\Yii::$app->request->getRawBody());

            }
            $array = array (

                $secret,
                $desc = $post['desc'],
                $currency = $post['currency'],
                $shop = $post['shop'],
                $payment_id = $post['payment_id'],
                $amount = $post['amount']

            );

       /*     $array = array (

                $secret,
                $desc = isset($post['desc']) ? $post['desc'] : '',
                $currency = isset($post['currency']) ? $post['currency'] : '',
                $shop = isset($post['shop']) ? $post['shop'] : $post['shop'],
                $payment_id = isset($post['payment_id']) ? $post['payment_id'] : '',
                $amount = isset($post['amount'])  ? $post['amount'] : ''

            ); */

            // Соединение массива в строку и хеширование функцией md5
            $sign = md5 ( implode ( '|', $array ) );

            if ($sign != $post['sign'] ) {
                die( 'Подпись не совпадает.');
            }

            $record = PayokOrder::findOne($payment_id);
            if(!$record){
                die( 'Не найдено');
            }
            if($post['underpayment'] === 0) {
                $record->status = 1;
                $record->save(false);

            }
            if(isset($post['user_id'])){
                $profile = Profile::find()->where(['user_id' => intval($post['user_id']) ])->one();
                if($profile && isset($post['profit'])){
                    $profile->credit = $profile->credit + $post['profit'];
                    $profile->save(false);
                }
            }

            \Yii::$app->response->format =  \yii\web\Response::FORMAT_JSON;
            \Yii::$app->response->statusCode = 200;
            return [
                'success'
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