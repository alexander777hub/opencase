<?php


namespace app\models;

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
        //    [['payment'], 'string', 'max' => 36],
            [['email'], 'email'],
            [['desc'], 'string', 'max' => 255],
            [['shop'], 'integer'],
            [['status'], 'integer'],
            [['method'],'string', 'max' => 2],
            [['currency'],'string', 'max' => 4],
            [['amount'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',],
        ];
    }

    public function addParams()
    {
        $this->desc = 'Пополнение баланса';
        $this->shop = \Yii::$app->params['shop_id'];
        $this->currency = 'RUB';
        $this->method = 'cd';
    }

    public function addSign()
    {
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
