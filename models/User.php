<?php

namespace app\models;

use app\modules\mng\models\Opening;
use dektrium\user\helpers\Password;
use Yii;
use yii\helpers\ArrayHelper;
use dektrium\user\models\User as BaseUser;
use yii\web\ForbiddenHttpException;

/**
 * This is the model class for table "opening".
 *
 * @property int $id
 * @property Opening[] $openings
 *
 *
 */


class User extends BaseUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username rules
            'usernameTrim'     => ['username', 'trim'],
            'usernameRequired' => ['username', 'required', 'on' => ['register', 'create', 'connect', 'update']],
            'usernameMatch'    => ['username', 'match', 'pattern' => static::$usernameRegexp],
            'usernameLength'   => ['username', 'string', 'min' => 3, 'max' => 255],
            /*'usernameUnique'   => [
                'username',
                'unique',
                'message' => \Yii::t('user', 'This username has already been taken')
            ], */

            // email rules
            'emailTrim'     => ['email', 'trim'],
           // 'emailRequired' => ['email', 'required', 'on' => ['register', 'connect', 'create', 'update']],
            'emailPattern'  => ['email', 'email'],
            'emailLength'   => ['email', 'string', 'max' => 255],
            'emailUnique'   => [
                'email',
                'unique',
                'message' => \Yii::t('user', 'This email address has already been taken')
            ],

            // password rules
            //'passwordRequired' => ['password', 'required', 'on' => ['register']],
            'passwordLength'   => ['password', 'string', 'min' => 6, 'max' => 72, 'on' => ['register', 'create']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();

        return $labels;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function getProfile()
    {
        return Profile::find()->where(['user_id' => $this->getId()])->one();
    }
    public function register()
    {
        return parent::register();
    }

    public static function findByUsername($username, $password)
    {
        $user = self::find()->where(['username' => $username])->one();

        if (hash('sha256', $password) == $user->username)
        {
            return new static($user);
        }
    }


    public function getOpenings() {
        return $this->hasMany(Opening::className(), ['id' => 'case_id'])
            ->viaTable('opening_user', ['user_id' => 'id']);
    }

    public static function getUser($id)
    {
        return User::findOne($id)  ? User::findOne($id) : null;
    }
}
