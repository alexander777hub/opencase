<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%recreation_zone}}".
 *
 * @property int $id
 * @property int $type
 * @property string|null $description
 * @property string $title
 * @property string|null $phones
 * @property string|null $adress
 * @property int $city_id
 * @property string $site
 * @property string $vk_link
 * @property string|null $comment
 * @property int|null $photo
 */
class RecreationZone extends \yii\db\ActiveRecord
{

    public $city_name;
    public $type_name;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%recreation_zone}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'city_id', 'photo'], 'integer'],
            [['title', 'site', 'vk_link'], 'required'],
            [['description', 'comment'], 'string', 'max' => 1000],
            [['title', 'site', 'vk_link'], 'string', 'max' => 20],
            [['phones', 'adress'], 'string', 'max' => 255],
            ['site', 'url', 'defaultScheme' => 'https'],
            ['vk_link', 'url', 'defaultScheme' => 'https'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Тип'),
            'description' => Yii::t('app', 'Описание'),
            'title' => Yii::t('app', 'Название'),
            'phones' => Yii::t('app', 'Телефоны'),
            'adress' => Yii::t('app', 'Адрес'),
            'city_id' => Yii::t('app', 'Город'),
            'site' => Yii::t('app', 'Сайт'),
            'vk_link' => Yii::t('app', 'Группа вк'),
            'comment' => Yii::t('app', 'Комментарий'),
            'photo' => Yii::t('app', 'Photo'),
        ];
    }

    public static function getZoneList()
    {
        return [
            1 => "Ресторан",
            2 => "Кафе",
        ];
    }
}
