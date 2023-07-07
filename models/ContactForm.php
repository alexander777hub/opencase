<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;
    public $acordul_tc;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            //            ['verifyCode', 'captcha'],
            ['acordul_tc', 'required', 'requiredValue' => 1,
             'message' => Yii::t('app','Вы должны согласиться с условиями')],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'subject' => 'Тема',
            'body' => 'Текст',
            'verifyCode' => 'Капча',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            $body = 'Имя отправителя: '. $this->name."\n".'E-mail отправителя: '. $this->email."\n".$this->body;
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['supportEmail'] => 'no-reply'])
                ->setSubject($this->subject)
                ->setTextBody($body)
                ->send();
            return true;
        }
        return false;
    }
}
