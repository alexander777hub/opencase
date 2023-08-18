<?php

namespace app\modules\mng\models;

use Yii;

/**
 * This is the model class for table "upgrade".
 *
 * @property int $id
 * @property int $user_id
 * @property int $item_id
 * @property float|null $price
 * @property int $status
 */
class Upgrade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'upgrade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'item_id'], 'required'],
            [['user_id', 'item_id', 'status'], 'integer'],
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
            'item_id' => 'Item ID',
            'price' => 'Price',
            'status' => 'Status',
        ];
    }
}
