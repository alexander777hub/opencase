<?php

namespace app\modules\mng\models;

use Yii;

/**
 * This is the model class for table "market_order".
 *
 * @property int $id
 * @property int $item_id
 * @property string|null $custom_id
 * @property int|null $price
 * @property int $user_id
 * @property int|null $status
 */
class MarketOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'market_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'user_id'], 'required'],
            [['item_id', 'price', 'user_id', 'status'], 'integer'],
            [['custom_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'custom_id' => 'Custom ID',
            'price' => 'Price',
            'user_id' => 'User ID',
            'status' => 'Status',
        ];
    }
}
