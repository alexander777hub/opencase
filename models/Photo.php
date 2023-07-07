<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%photo}}".
 *
 * @property int $id
 * @property int $userform_id
 * @property int $type
* @property string| null $link
 *
 * @property Userform $userform
 */
class Photo extends \yii\db\ActiveRecord
{

    public $_file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%photo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userform_id'], 'required'],
            [['userform_id', 'type'], 'integer'],
            [['userform_id'], 'exist', 'skipOnError' => true, 'targetClass' => Userform::className(), 'targetAttribute' => ['userform_id' => 'id']],
            [['_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            /*[['_file'], 'required', 'when' => function ($model) {
                return $model->getIsNewRecord();
            }],*/
            [['link'], 'string', 'max' => 50],
            [['link', '_file'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'userform_id' => Yii::t('app', 'Userform ID'),
            'type' => Yii::t('app', 'Тип'),
        ];
    }

    public function uploadProfilePicture() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $this->_file = $image = UploadedFile::getInstance($this, '_file');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        //$this->filename = $image->name;
        $arr = explode(".", $image->name);
        $ext = end($arr);

        // generate a unique file name
        $this->link = Yii::$app->security->generateRandomString().".{$ext}";

        // the uploaded profile picture instance
        return $image;
    }
    public function getProfilePictureFile()
    {
        return !empty($this->link) ? Yii::getAlias('@webroot') . '/uploads/photo/' . $this->link : 'default.png';
    }
    public static function getAvatarUrl($id)
    {
        $photo = Photo::findOne($id);
        // return a default image placeholder if your source profile_pic is not found
        $photo_pic = $photo ? $photo->link : 'default.png';
        return  Yii::$app->urlManager->createAbsoluteUrl(['/']) . 'uploads/photo/' . $photo_pic;
    }



    public static function getType()
    {
        return [
           1 => "Публичный",
           2 => "Приватный"
        ];
    }

    /**
     * Gets query for [[Userform]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserform()
    {
        return $this->hasOne(Userform::className(), ['id' => 'userform_id']);
    }
}
