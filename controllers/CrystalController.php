<?php


namespace app\controllers;

use app\models\CrystalOrder;
use app\models\PayokOrder;
use app\modules\mng\models\Bank;
use dektrium\user\models\Profile;
use yii\helpers\Url;

/**
 * Class CrystalController
 *
 * @package app\models
 */
class CrystalController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionSuccess()
    {
        if ($this->request->isPost) {

            $secret = \Yii::$app->params['crystal_secret'];


            $content = json_decode(\Yii::$app->request->getRawBody(), true);
            \Yii::info("POST REQUEST HERE");
            \Yii::info($content);


            $id = $content["id"];
            $signature = $content["signature"];

            $salt =  \Yii::$app->params['crystal_sault'];

            $hash = sha1($id.":".$salt);

            if (!hash_equals($hash, $signature)) {
                \Yii::info("CRYSTAL SIGN INVALID");

              //Безопасное сравнение подписи callback
                exit("Invalid signature!");
            }

            $pay_amount  = isset($content['pay_amount']) ? $content['pay_amount'] : 0;
            $record = CrystalOrder::find()->where(['payment'=>$id])->one();
            if (!$record) {
                \Yii::info("NOT FOUND THIS ID");
                die('Не найдено');
            }
            $record->status = 1;
            $record->save(false);
            $profile = Profile::find()->where(['user_id' => intval($record->user_id)])->one();
            if ($profile && $pay_amount) {
                $profile->credit = $profile->credit + $pay_amount;
                $profile->save(false);
                $bank = new Bank();
                $bank->add($pay_amount);
            }
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            \Yii::$app->response->statusCode = 200;
            return [
                'success',
            ];
        }
    }

}