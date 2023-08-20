<?php

namespace app\modules\mng\models;

use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property int $id
 * @property int $user_id
 * @property float|null $price
 */
class Contract extends \yii\db\ActiveRecord
{
    const CONTRACT_STATUS_REPLACED = 3;

    const CONTRACT_STATUS_SUCCESS = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'price' => 'Price',
        ];
    }
}
