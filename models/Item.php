<?php

namespace app\models;

use alexander777hub\crop\models\PhotoEntity;
use app\modules\mng\models\ItemPhotoEntity;
use app\modules\mng\models\Opening;
use app\modules\mng\models\OpeningItemInit;
use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property int $appid
 * @property int|null $classid
 * @property int|null $instanceid
 * @property int $currency
 *  @property string|null  $background_color
 *   @property string|null   $icon_url
 * @property string|null $icon_url_large
 * @property string|null $exterior
 * @property string|null $internal_name
 * @property string|null $type
 * @property string|null $name
 * @property string|null $market_hash_name
 * @property string|null $rarity
 * @property Opening[] $openings
 *  @property OpeningItemInit[] $initOpenings
 * @property float|null $price
 */
class Item extends \yii\db\ActiveRecord
{
    public function beforeDelete()
    {
        $q = 'DELETE FROM `opening_item` WHERE
                    `opening_item`.`item_id` = ' .(int) $this->id . '
                     ';
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public static function getFullList()
    {
        $arr = \yii\helpers\ArrayHelper::map(\app\models\Item::find()->all(), 'id', 'market_hash_name');
        $arr[0] = 'Не выбран';
        ksort($arr);
        return $arr;
    }
    public static function getFullListSelect2()
    {
        $items = \app\models\Item::find()->all();
        foreach($items as $k=>$val){
            if(!$val->price){
                unset($items[$k]);
            }
        }
        $arr = \yii\helpers\ArrayHelper::map($items, 'id', 'internal_name');
        return $arr;
    }

    public $photo;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appid', 'instanceid', 'currency', 'instanceid'], 'integer'],
            [['background_color', 'icon_url_large', 'rarity', 'type', 'exterior', 'name', 'photo', 'internal_name',], 'string', 'max' => 255],
            [['price'], 'number', 'numberPattern' => '/^[1-9][-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',  'min' => 0.01, 'max' => 999999999.9999],
        ];
    }

    public static function getScins()
    {
        return [
            0 => 'Не выбрано',
            1 => 'Blue',
            2 => 'Violet',
            3 => 'Pink',
            4 => 'Red',
            5 => 'Gold'

        ];
    }



    /**
     * Gets query for [[Photos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(ItemPhotoEntity::className(), ['bind_obj_id' => 'id']);
    }

    public function getOpenings() {
        return $this->hasMany(Opening::className(), ['id' => 'case_id'])
            ->viaTable('opening_item', ['item_id' => 'id']);
    }

    public function getInitOpenings() {
        return $this->hasMany(Opening::className(), ['id' => 'case_id'])
            ->viaTable('opening_item_init', ['item_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appid' => 'App ID',
            'class_id' => 'Class ID',
            'currency' => 'Currency',
            'icon' => 'Icon',
            'icon_large' => 'Icon Large',
            'price' => 'Price'
        ];
    }

    public static function getOriginal($icon)
    {
        if(!$icon){
            return false;

        }
        $original =  str_replace('public', 'original', $icon);
        return $original;
    }
}
