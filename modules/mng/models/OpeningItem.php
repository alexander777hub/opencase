<?php

namespace app\modules\mng\models;

use Yii;

/**
 * This is the model class for table "opening_item".
 *
 * @property int $id
 * @property int $case_id
 * @property int $item_id
 * @property int|null $user_id
 * @property float $price
 * @property int|null $status
 * @property int|null $count
 * @property int|null $is_sold
 */
class OpeningItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opening_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['case_id', 'item_id', 'price'], 'required'],
            [['case_id', 'item_id', 'user_id'], 'integer'],
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
            'case_id' => 'Case ID',
            'item_id' => 'Item ID',
            'user_id' => 'User ID',
            'price' => 'Price',
        ];
    }
}
