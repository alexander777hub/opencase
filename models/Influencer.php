<?php

namespace app\models;

use klisl\behaviors\JsonBehavior;
use Yii;
use yii\db\Query;

/**
 * This is the model class for table "{{%influencer}}".
 *
 * @property int $id
 * @property string $username
 * @property int $platform
 * @property int $status
 * @property int $audience
 * @property float $engagement_rate
 * @property int $user_id
 */
class Influencer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%influencer}}';
    }
    public function behaviors(): array
    {
        return [
            [
                'class' => JsonBehavior::class,
                'property' => 'insights',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'audience', 'engagement_rate', 'user_id', 'id'], 'required'],
            [['audience', 'user_id', 'id'], 'integer'],
            [['engagement_rate'], 'number'],
            [['username', 'status', 'platform', 'profile_url',  'profile_id'], 'string', 'max' => 255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'platform' => Yii::t('app', 'Platform'),
            'status' => Yii::t('app', 'Status'),
            'audience' => Yii::t('app', 'Audience'),
            'engagement_rate' => Yii::t('app', 'Engagement Rate'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }
    public function load($data, $formName = null)
    {
        if (!empty($data)) {
            $this->setAttributes($data);

            return true;
        }

        return false;
    }
    public static function hasRecord($id)
    {
        if(Yii::$app->user->identity){
            $res = (new \yii\db\Query())
                ->select('*')
                ->from('influencer')
                ->where(['id' => $id])
                ->andWhere(['user_id' => Yii::$app->user->identity->getId()])
                ->one();

            if ($res) {
                return true;
            } else {
                return false;
            }
        }




    }
}
