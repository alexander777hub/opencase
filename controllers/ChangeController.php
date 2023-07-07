<?php


namespace app\controllers;

use app\models\Profile;
use app\models\Userform;
use dektrium\user\traits\EventTrait;
use Yii;

/**
 * Class TestController
 * @package app\controllers
 */
class ChangeController extends \yii\web\Controller
{

    use EventTrait;

    /**
     * Event is triggered before creating new user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_CREATE = 'beforeCreate';

    /**
     * Event is triggered after creating new user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_CREATE = 'afterCreate';

    /**
     * Event is triggered before updating existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_UPDATE = 'beforeUpdate';

    /**
     * Event is triggered after updating existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_UPDATE = 'afterUpdate';

    /**
     * Event is triggered before impersonating as another user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_IMPERSONATE = 'beforeImpersonate';

    /**
     * Event is triggered after impersonating as another user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_IMPERSONATE = 'afterImpersonate';

    /**
     * Event is triggered before updating existing user's profile.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_PROFILE_UPDATE = 'beforeProfileUpdate';

    /**
     * Event is triggered after updating existing user's profile.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_PROFILE_UPDATE = 'afterProfileUpdate';

    /**
     * Event is triggered before confirming existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_CONFIRM = 'beforeConfirm';

    /**
     * Event is triggered after confirming existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_CONFIRM = 'afterConfirm';

    /**
     * Event is triggered before deleting existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_DELETE = 'beforeDelete';

    /**
     * Event is triggered after deleting existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_DELETE = 'afterDelete';

    /**
     * Event is triggered before blocking existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_BLOCK = 'beforeBlock';

    /**
     * Event is triggered after blocking existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_BLOCK = 'afterBlock';

    /**
     * Event is triggered before unblocking existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_UNBLOCK = 'beforeUnblock';

    /**
     * Event is triggered after unblocking existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_UNBLOCK = 'afterUnblock';

    /**
     * Name of the session key in which the original user id is saved
     * when using the impersonate user function.
     * Used inside actionSwitch().
     */
    const ORIGINAL_USER_SESSION_KEY = 'original_user';

    /** @var Finder */
    protected $finder;
    public function actionIndex()
    {

        $models = Userform::find()->all();

        foreach($models as &$uform){
            $post = [

                "User" => [
                    "email"=> $this->actionGenerateEmailAddress(), "username" => $this->actionGenerateUsername() , "password" =>  "123456"
                ],



            ];
            $user = \Yii::createObject([
                'class'    => \dektrium\user\models\User::className(),
                'scenario' => 'create',
            ]);
            if ($user->load($post)) {

                // $event =
                if (!$user->validate()) {
                    foreach ($user->getErrors() as $error) {
                        var_dump($user->error);
                    }
                }

                $user->create();
                $event = $this->getUserEvent($user);


                $this->trigger(self::EVENT_AFTER_CREATE, $event);
                $model = Profile::findOne($user->id);
                if ($model) {
                    //$model->sex = 2;
                    //$model->agency_id=$id;
                    //echo('HERE1');
                    //exit();
                    if ($model->save(false)) {//а почему не хочет model(save)
                        $uform->user_id = $user->id;
                        $uform->manager_id = 2;
                        //echo('HERE2');exit();
                        //var_dump($model->manager_id);exit();
                        if ($uform->save(false)) {
                            echo 'Изменена' . $uform->id . ' user_id=' . strval($user->id) . '<br>';

                        } else {
                            foreach ($uform->getErrors() as $error) {
                                var_dump($error);
                            }
                        }

                    }

                }


            }

        }



    }
    public function actionGenerateEmailAddress(){
        $str = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil(10/strlen($x)) )),1,10);
        $email = $str . '@zz' . '.com';
       return $email;
    }
    public function actionGenerateUsername(){
        $str = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil(7/strlen($x)) )),1,7);

        return $str;
    }
}