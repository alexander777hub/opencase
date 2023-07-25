<?php

namespace app\modules\mng\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "opening_category".
 *
 * @property int $id
 * @property string $title
 * @property Opening[] $openings
 */
class OpeningCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opening_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }


    public function getOpenings()
    {
        return $this->hasMany(Opening::class, ['category_id' => 'id']);
    }

    public static function getFullList()
    {
        if(!($items = self::find()->asArray()->all())){
            return null;
        }
        $items = ArrayHelper::map($items, 'id', 'title');
        $items[0] = 'Не выбран';
        ksort($items);
        return $items;
    }
    public static function getFilteredCategoryList($category_id)
    {
        if(!($items = self::getFullList())){
            return null;
        }


        $items = array_filter($items, function($key) use ($category_id) {
            return $key !== $category_id;

        }, ARRAY_FILTER_USE_KEY );
        return $items;
    }

    public function getTitle()
    {
        return $this->title ? $this->title : null;
    }
}
