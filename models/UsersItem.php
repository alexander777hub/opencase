<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users_item}}".
 *
 * @property int $id
 * @property string $first_name
 * @property string $second_name
 * @property string $soname
 * @property string $email
 * @property string $phone
 */
class UsersItem extends \yii\db\ActiveRecord
{
    const TYPE_DB    = 1;
    const TYPE_JSON  = 2;
    const TYPE_CACHE = 3;
    const TYPE_XLSX  = 4;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'second_name', 'soname', 'email'],'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['email'], 'email'],
            [['first_name', 'second_name', 'soname', 'email', 'phone'], 'required'],
            [['first_name', 'second_name', 'soname', 'email', 'phone'], 'string', 'max' => 255],
            ['phone', 'match', 'pattern' => '/^\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message' => 'Phone is invalid' ],
            [['first_name', 'second_name', 'soname'], 'unique', 'targetAttribute' => ['first_name', 'second_name', 'soname']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'second_name' => Yii::t('app', 'Second Name'),
            'soname' => Yii::t('app', 'Soname'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
        ];
    }


    public function addItem(int $type, UsersItem $item)
    {
        $executor = null;
        switch ($type) {
            case  self::TYPE_DB:
                if ($item->validate()){
                    $executor = new DbExecutor();
                    break;
                } else {
                    return $item->getErrors();
                }
            case  self::TYPE_XLSX:
                if ($item->validate(['email', 'phone'] )){
                    $executor = new XslxExecutor();
                    break;
                } else {
                    return $item->getErrors();
                }
            case  self::TYPE_JSON:
                if ($item->validate(['email', 'phone'] )){
                    $executor = new JsonExecutor();
                    break;
                } else {
                    return $item->getErrors();
                }
            case  self::TYPE_CACHE:
                if ($item->validate(['email', 'phone'] )){
                    $executor = new RedisExecutor();
                    break;
                } else {
                    return $item->getErrors();
                }
        }
        $item = $executor->save($item);
        return $item;

    }
    public function getItems(int $type)
    {
        $executor = null;
        switch ($type) {
            case  self::TYPE_DB:
                $executor = new DbExecutor();
                break;
            case  self::TYPE_XLSX:
                $executor = new XslxExecutor();
                break;
            case  self::TYPE_JSON:
                $executor = new JsonExecutor();
                break;
            case  self::TYPE_CACHE:
                $executor = new RedisExecutor();
                break;
        }
        $item = $executor->getAll();
        return $item;

    }
    public function load($data, $formName = null)
    {
        if (!empty($data)) {
            $this->setAttributes($data);
            return true;
        }

        return false;
    }

}
