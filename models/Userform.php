<?php

namespace app\models;

use alexander777hub\crop\models\PhotoEntity;
use Yii;

/**
 * This is the model class for table "{{%userform}}".
 *
 * @property int         $id
 * @property string      $first_name
 * @property string      $second_name
 * @property string      $soname
 * @property int         $sex
 * @property string      $was_born
 * @property int         $height
 * @property int         $weight
 * @property int         $city_id
 * @property             $target
 * @property string|null $about_me
 * @property string|null $about_partner
 * @property int         $find_zone
 * @property int         $ready_to_relocate
 * @property string|null $comment
 * @property int|null    $avatar_id
 * @property string|null $phone
 * @property string|null $vk_link
 * @property Photo[]     $photos
 * @property Comment[]   $comments
 * @property  int | null $user_id
 * @property  int        $partner_sex
 * @property  int | null $partner_age
 * @property  int | null $meeting_purpose
 * @property  int | null $status
 * @property  int | null $manager_id
 * @property  int        $source
 */
class Userform extends \yii\db\ActiveRecord
{
   public $email;
   public $password;
   //public $avatar_id;

    public $sexname;
    public $city_name;
    public $relocate_status;
    public $target_name;
    public $target_meeting_purpose_name;
    public $find_zone_name;
    public $partner_sex_name;
    public $partner_age_name;
    public $photo;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%userform}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['user_id', 'unique'],
            [['first_name', 'city_id'], 'required'],
            [['sex','manager_id', 'status', 'source', 'height', 'weight', 'city_id', 'find_zone', 'ready_to_relocate', 'avatar_id', 'user_id'], 'integer'],
            [['about_me', 'about_partner', 'comment', 'phone', 'vk_link'], 'string'],
            [['first_name', 'second_name', 'soname', 'was_born'], 'string', 'max' => 50],
            ['vk_link', 'url', 'defaultScheme' => 'https'],
            //[['target'], 'json'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'Имя'),
            'second_name' => Yii::t('app', 'Отчество'),
            'soname' => Yii::t('app', 'Фамилия'),
            'sex' => Yii::t('app', 'Пол'),
            'was_born' => Yii::t('app', 'Год рождения'),
            'height' => Yii::t('app', 'Рост'),
            'weight' => Yii::t('app', 'Вес'),
            'city_id' => Yii::t('app', 'Город'),
            'target' => Yii::t('app', 'Цель знакомства'),
            'about_me' => Yii::t('app', 'Обо мне'),
            'about_partner' => Yii::t('app', 'О партнере'),
            'find_zone' => Yii::t('app', 'Ареал поиска'),
            'ready_to_relocate' => Yii::t('app', 'Готов к переезду'),
            'comment' => Yii::t('app', 'Комментарий'),
            'avatar_id' => Yii::t('app', 'Аватар'),
            'phone' => Yii::t('app', 'Телефон'),
            'vk_link' => Yii::t('app', 'Ссылка Вк'),
            'status' => Yii::t('app', 'Статус'),
            'source' => Yii::t('app', 'Источник'),
        ];
    }

    /**
     * Gets query for [[Photos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(PhotoEntity::className(), ['bind_obj_id' => 'id']);
    }
    /**
     * Gets query for [[Photos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['userform_id' => 'id']);
    }
    public static function getAge($birthday)
    {
        $now = new \DateTime();
        $now = date_format($now, 'Y');
        $age = intval($now) - intval($birthday);
        return $age;
    }

    public static function getAges()
    {
        return [
            0 => "18 — 21",
            1 => "21—35",
            2 => "35—60",
        ];
    }

    public static function getTargetsForSelect()
    {
        return [
            0 => "Не выбрано",
            1 => "брак и семья",
            2 => "свободные романтические отношения",
            5 => "свидание",

        ];

    }


    public static function getTargets()
    {
        return [
            1 => "брак и семья",
            2 => "свободные романтические отношения",
            3 => "длительные отношения с мп",
            4 => "встречи с мп",
            5 => "свидание",

        ];
    }

    public const USERFORM_TARGET_BRAK = "1";
    public const USERFORM_TARGET_OTNOSHENIYA = "2";
    public const USERFORM_TARGET_SVIDANIE = "5";
    public static function getMeetingTargets()
    {
        return [
            1 => "Онлайн встреча",
            2 => "Прогулки",
            3 => "Кино",
            4 => "Кафе",
            5 => "Ресторан",
            6 => "Мероприятие",
            7 => "Другое"

        ];
    }
    public static function getMeetingTargetsView()
    {
        return [
            0 => "Не задано",
            1 => "Онлайн встреча",
            2 => "Прогулки",
            3 => "Кино",
            4 => "Кафе",
            5 => "Ресторан",
            6 => "Мероприятие",
            7 => "Другое"

        ];
    }
    public static function getAncetStatus()
    {
        return [
            0 => "Новая",
            1 => "В работе",
            2 => "Отложена",
            3 => "В архиве",
            5 => 'Специальная'

        ];
    }

    public static function getSourceList()
    {
        return [
            0 => "Не выбрано",
            1 => "Дворянка"
        ];
    }

    public static function getFindZone()
    {
        return [
            0 => "Не выбрано",
            1 => "Свой город",
            2 => "Область",
            3 => "Вся Россия",
        ];
    }
    public static function getRelocateStatus()
    {
        return [
            0 => "Не выбрано",
            1 => "Готов к переезду",
            2 => "Не готов к переезду",
        ];
    }

    public static function isAvatar($id, $avatar_id)
    {
        $model = self::findOne($id);
        if($model->avatar_id == $avatar_id){
            return true;
        }
        return false;

    }

    public static function getAgeRange()
    {

        $keys = array_combine(range(18, 90), range(18, 90));
         return $keys;

    }
    public static function getAvatarUrl($id)
    {
        $photo = PhotoEntity::findOne($id);
        // return a default image placeholder if your source profile_pic is not found
        return $photo && $photo->url ? $photo->url : "/uploads/profile/default.png";
    }


}
