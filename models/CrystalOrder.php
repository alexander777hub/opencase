<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crystal_order".
 *
 * @property int $id
 * @property int $status
 * @property string $type
 * @property string|null $payment
 * @property string $required_method
 * @property string $amount_currency
 * @property string $email
 * @property string $description
 * @property int $user_id
 * @property string $lifetime
 * @property string|null $redirect_url
 * @property string|null $callback_url
 */
class CrystalOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crystal_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'user_id'], 'integer'],
            [['email', 'user_id', 'amount', 'type', 'lifetime'], 'required'],
            [['type', 'email', 'description', 'lifetime', 'redirect_url', 'callback_url'], 'string', 'max' => 255],
            [['payment'], 'string', 'max' => 36],
            [['required_method'], 'string', 'max' => 20],
            [['amount_currency'], 'string', 'max' => 20],
            [['amount'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',"message" => "Amount should be decimal value. Format: 0.00", 'min' => 1.00, 'max' => 999999999.9999],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'type' => 'Type',
            'payment' => 'Payment',
            'required_method' => 'Required Method',
            'amount_currency' => 'Amount Currency',
            'email' => 'Email',
            'description' => 'Description',
            'user_id' => 'User ID',
            'lifetime' => 'Lifetime',
            'redirect_url' => 'Redirect Url',
            'callback_url' => 'Callback Url',
        ];
    }
}
