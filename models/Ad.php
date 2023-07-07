<?php

namespace app\models;

use Yii;
use dektrium\user\models\User;

/**
 * This is the model class for table "{{%ad}}".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $status
 * @property int $type
 * @property string|null $description
 * @property string|null $note
 * @property int $sex
*  @property string $title
 * @property int $age
 * @property int $user_id
 * @property int $city_id
 *
 * @property User $user
 */
class Ad extends \yii\db\ActiveRecord
{

    public const STATUS_APPROUVED = 2;
    public  $link;
    public $username;

    public $photo;
    public $city_name;

    public $sex_name;
    public $type_name;
    public $status_name;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ad}}';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'title', 'updated_at'], 'safe'],
            [['status', 'type', 'sex', 'age', 'user_id'], 'integer'],
            [['user_id'], 'required'],
            [['title', 'link'], 'string', 'max'=>20],
            [['description', 'note'], 'string', 'max' => 1000],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'created_at' => Yii::t('app', 'Создано'),
            'updated_at' => Yii::t('app', 'Обновлено'),
            'status' => Yii::t('app', 'Статус'),
            'type' => Yii::t('app', 'Тип'),
            'title' => Yii::t('app', 'Название свидания'),
            'description' => Yii::t('app', 'Описание свидания'),
            'sex' => Yii::t('app', 'Пол'),
            'age' => Yii::t('app', 'Возраст'),
            'user_id' => Yii::t('app', 'Пользователь'),
            'note' => Yii::t('app', 'Примечание'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProfile()
    {
        return Profile::find()->where(['user_id' =>$this->user_id])->asArray()->one();
    }

    public function getProfileAttribute($attr_name)
    {
        $profile = $this->getProfile($this->user_id);
        if ($profile) {
            $attr = isset($profile[$attr_name]) && !empty($profile[$attr_name]) ? $profile[$attr_name] : null;
            return $attr;
        }
        return null;

    }
    public function getCity()
    {

    }




    /**
     * {@inheritdoc}
     * @return AdQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdQuery(get_called_class());
    }
    public static function getSexTypes()
    {
        return [
            0 => 'Выберите пол',
            1 => 'Мужской',
            2 => 'Женский'
        ];
    }
    public static function getTypeList()
    {
        return [
            1 => 'Приглашаю на свидание',
            2 => 'Приму приглашение',
        ];
    }
    public static function getTypeListForSelect()
    {
        return [
            0 => "Не выбрано",
            1 => 'Приглашаю на свидание',
            2 => 'Приму приглашение',
        ];
    }
    public static function getStatusList()
    {
        return [

            0 => 'Создано',
            1 => 'На рассмотрении',
            2 => 'Опубликовано',
            3 => 'Заблокировано',
        ];
    }

}
