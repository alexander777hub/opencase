<?php

namespace app\modules\mng\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property int $id
 * @property float $account
 * @property float $profit
 * @property int|null $admin_id
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account', 'profit'], 'required'],
            [['account', 'profit'], 'number'],
            [['admin_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account' => 'Account',
            'profit' => 'Profit',
            'admin_id' => 'Admin ID',
        ];
    }

    public function add($amount)
    {
        $account = Bank::find()->one();
        $our_profit= (floatval($amount) / 100) * 6;
        $account->account = $account->account + (floatval($amount) - $our_profit);
        $account->profit = $account->profit + $our_profit;
        $account->save(false);
    }
}
