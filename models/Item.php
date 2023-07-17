<?php

namespace app\models;

use alexander777hub\crop\models\PhotoEntity;
use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property int $app_id
 * @property int|null $class_id
 * @property int $currency
 * @property string|null $icon
 * @property string|null $icon_large
 * @property string|null $internal_name
 * @property  int|null $profile_id
 * @property  Profile $profile
 */
class Item extends \yii\db\ActiveRecord
{

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
            [['app_id', 'class_id', 'currency', 'profile_id'], 'integer'],
            [['icon', 'icon_large', 'photo', 'internal_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(User::className(), ['user_id' => 'profile_id']);
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_id' => 'App ID',
            'class_id' => 'Class ID',
            'currency' => 'Currency',
            'icon' => 'Icon',
            'icon_large' => 'Icon Large',
        ];
    }
}
