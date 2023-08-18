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
 * @property int|null $contract_id
 * @property int $upgrade_status
 */
class OpeningItem extends \yii\db\ActiveRecord
{

    const UPGRADE_STATUS_SUCCESS = 1;
    const UPGRADE_STATUS_FAIL = 2;

    const UPGRADE_STATUS_NONE = 0;
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
