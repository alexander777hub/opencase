<?php

namespace app\modules\mng\models;

use Yii;

/**
 * This is the model class for table "opening_item_init".
 *
 * @property int $id
 * @property int $case_id
 * @property int $item_id
 * @property float $price
 */
class OpeningItemInit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opening_item_init';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['case_id', 'item_id', 'price'], 'required'],
            [['case_id', 'item_id'], 'integer'],
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
            'price' => 'Price',
        ];
    }
}
