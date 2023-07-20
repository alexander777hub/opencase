<?php


namespace app\models;

use yii\helpers\Url;

/**
 * Class PayokForm
 *
 * @package app\models
 */

class PayokOrder extends \yii\db\ActiveRecord
{
    public $terms;



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%payok_order}}';
    }

    public function rules()
    {
        return [
            [['amount', 'shop', 'desc', 'method', 'currency', 'email'], 'required'],
            [['payment'], 'string', 'max' => 36],
            [['email'], 'email'],
            [['desc'], 'string', 'max' => 255],
            [['shop'], 'integer'],
            [['status'], 'integer'],
            [['method'],'string', 'max' => 2],
            [['currency'],'string', 'max' => 4],
            [['amount'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',"message" => "Amount should be decimal value. Format: 0.00"],
        ];
    }

    public function addParams()
    {
        $this->desc = 'Balance replenishment';
        $this->shop = \Yii::$app->params['shop_id'];
        $this->currency = 'RUB';
        $this->method = 'cd';
        $this->payment = strtotime("now") . \Yii::$app->user->getId();
    }

    public function addSign()
    {
        //$array = array (
        //
        //$amount = 100.5,
        //$payment = 10000,
        //$shop = 1,
        //$currency = 'RUB',
        //$desc = 'Тестовый товар',
        //$secret = 'SECRET KEY' //Узнайте свой секретный ключ в личном кабинете
        //
        //);
        $array = [

            $amount = $this->amount,
            $payment = $this->payment,
            $shop = $this->shop,
            $currency = $this->currency,
            $desc = $this->desc,
            $secret = \Yii::$app->params['payok_key'] //Узнайте свой секретный ключ в личном кабинете

        ];

        // Соединение массива в строку и хеширование функцией md5
        $sign = md5(implode('|', $array));

        return $sign;

    }





}
