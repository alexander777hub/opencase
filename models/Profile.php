<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models;

use alexander777hub\crop\models\PhotoEntity;
use app\modules\mng\models\Opening;
use Yii;
use dektrium\user\models\Profile as BaseProfile;
use dektrium\user\models\User;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use  yii\db\Query;
use dosamigos\taggable\Taggable;
use app\modules\manager\models\Manager;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 * @property string  $public_email
 * @property string  $gravatar_email
 * @property string  $gravatar_id
 * @property string  $location
 * @property string  $website
 * @property string  $bio
 * @property string  $timezone
 * @property string  $photo
 * @property string  $birthday
 * @property float   $credit
 * @property float   $city_id
 * @property float   $sex
 * @property float   $vk_link
 * @property User    $user
 * @property string|null $steam_id
 * @property integer|null $visibility
 * @property integer $status
 * @property string  $photo_full
 * @property string  $trade_link
 * @property Item[] $items
 */
class Profile extends BaseProfile
{   
    public $_avatar;    // variable to get the picture
    const ROLE_ADMINISTRATOR = 'administrator';
    const ROLE_USER = 'user';
    const ROLE_MAIN_MANAGER = 'main_manager';
    const ROLE_MANAGER = 'manager';

    public const DEFAULT_PROFILE_ICON = "/uploads/profile/default.png";
    public static $sex_list = [
        0=>'Выберите пол...',
        1 => 'Мужской',
        2 => 'Женский'
    ];

    public static $city_list = [
        0 => 'Не выбрано',
        1 => 'Москва',
        2 => 'Санкт-Петербург',
        3 => 'Новосибирск',
        4 => 'Екатеринбург',
        5 => 'Казань',
        6 => 'Нижний Новгород',
        7 => 'Челябинск',
        8 => 'Самара',
        9 => 'Уфа',
        10 => 'Ростов-на-Дону',
        11 => 'Омск',
        12 => 'Красноярск',
        13 => 'Воронеж',
        14 => 'Пермь',
        15 => 'Волгоград',
        16 => 'Барнаул',
    ];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] =  [['photo','vk_link', 'photo_full'], 'string', 'max' => 255];
        $rules[] =  [['photo','credit','bio','_avatar'], 'safe'];
        $rules[] =  [['city_id','sex',], 'integer'];
        $rules[] = [['visibility'],  'in', 'range' => [1, 2, 3]];
        $rules[] = [['status'],   'in', 'range' => [0, 1, 2, 3, 4,5]];
        $rules[] =  [['trade_link'], 'url', 'defaultScheme' => 'https'];
        //$rules[] =  [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'];
        $rules[] = [['_avatar'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'];
       // $rules[] =  [['city_id','sex'], 'required'];
        $rules[] =  [['birthday'], 'safe'];

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['photo'] = Yii::t('app', 'Фото');
        $labels['photo_full'] = Yii::t('app', 'Фото полное');
        $labels['_avatar'] = Yii::t('app', 'Фото');
        $labels['credit'] = Yii::t('app', 'Баланс');
//        $labels['referrer_id'] = 'Реферер';
        $labels['sex'] = Yii::t('app', 'Пол');
        $labels['birthday'] = Yii::t('app', 'Дата рождения');
        $labels['city_id'] = Yii::t('app', 'Город');
        $labels['vk_link'] = Yii::t('app', 'Ссылка ВК');
        return $labels;
    }

      /*  public function beforeSave($insert)
    {
        if (is_string($this->_avatar) && strstr($this->_avatar, 'data:image')) {
            $uploadPath = Yii::getAlias('@webroot') . '/uploads/profile/photo';    // set a directory to save picture
            $data = $this->_avatar;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
            $fileName = Yii::$app->security->generateRandomString() . '.png';   // generate picture name
            file_put_contents($uploadPath . DIRECTORY_SEPARATOR . $fileName, $data);

            if (!empty($this->avatar)) {    // "avatar" model attribute which stores picture name
                unlink(Yii::getAlias($uploadPath . DIRECTORY_SEPARATOR . $this->avatar));   // delete old picture
            }

        

            $this->photo = '/uploads/profile/photo/' . $fileName;  // set new picture name to attribute
        }

        return parent::beforeSave($insert);
    }
    
   /* public function upload()
    {
        echo('HERE');
        if ($this->validate()) {
            $name = $this->user_id . '_' . time() . '.' . $this->_avatar->extension;
            $this->_avatar->saveAs(Yii::getAlias('@webroot') . '/uploads' . $name);
            return true;
        } else {
            return false;
        }
    }*/
    
    public function getBalance()
        {           
            $man_id = Yii::$app->user->id;    
            
            /*$credit = (new \yii\db\Query())
            ->select(['credit'])
            ->from('profile')
            ->where(['user_id' => $man_id ])
            ->limit(10)
            ->queryScalar();*/
            $credit = Yii::$app->db->createCommand('SELECT credit FROM profile WHERE user_id =' .(int)$man_id . '')
            ->queryScalar();

            $credit = ((int)$credit);
            if($credit >= 5){
                
                $b = "YES";
                return $b;
            } else{
                //echo($credit);
                $b = "NO";
                return $b;
            }
        }
     
        
    public function getAvatarUrl($size = 200)
    {
        if (!empty($this->photo)) {
            return '/uploads/profile/' . $this->photo;
            
        } else  {
            return parent::getAvatarUrl($size);
        } 
    }

    public function getFavoritCasePhoto()
    {

        /**
         *  @var $user \app\models\User.
         */
        if(!$user = \app\models\User::findOne($this->user_id)){
            throw new NotFoundHttpException("Not found");
        }

        $cases = $user->getOpenings();
        $c = $cases->asArray()->all();
        if($cases){
            if(!isset($cases->all()[0])){
                return null;
            }
            $avatarId =  $cases->all()[0]['avatar_id'];
            if(!$avatarId){
                return '/uploads/photo/default.png';
            }

            $photo = PhotoEntity::findOne($avatarId);

            $name = explode('/', $photo->url)[4];

            return  '/uploads/profile/original/' . $name;;
        }
    }

    public function getFavoritCase()
    {
        /**
         * @var $user \app\models\User.
         */
        if (!$user = \app\models\User::findOne($this->user_id)) {
            throw new NotFoundHttpException("Not found");
        }
        $cases = $user->getOpenings();
        if ($cases && isset($cases->all()[0])) {
            return $cases->all()[0]['name'];
        }
        return null;
    }

    public function getReferrer()
    {
        return $this->hasOne(User::className(), ['id' => 'referrer_id']);
    }

    public static function getSexList() {
        $result = [];
        foreach (self::$sex_list as $key=>$val) {
            $result[$key] = Yii::t('app', $val);
        }
        return $result;
    }
    public static function getCityList()
    {
        $result = [];
        foreach (self::$city_list as $key=>$val) {
            $result[$key] = Yii::t('app', $val);
        }
        return $result;

    }

    public function getAge() {
        //echo($this->children_count);
        //echo('HERE');
        //var_dump($this);
        //$birhday = new DateTime($this ->birthday);
        //$to   = new DateTime('today');

        //$age =$birhday->diff($to)->y; а почему так нельзя ?
        $age = date_diff(date_create($this ->birthday), date_create('today'))->y;
        //echo($age);
        //echo($age);
        return $age;
    }

    public function getSexName() {
        return isset(self::$sex_list[$this->sex]) ? self::$sex_list[$this->sex] : '';
    }

    public function getCityName() {
        return isset(self::$city_list[$this->city_id]) ? self::$city_list[$this->city_id] : '';
    }


    public function getProfilePictureFile()
    {
        return !empty($this->photo) ? Yii::getAlias('@webroot') . '/uploads/profile/' . $this->photo : null;
    }

    public function getProfilePictureUrl()
    {
        // return a default image placeholder if your source profile_pic is not found
        $profile_pic = isset($this->photo) ? $this->photo : 'default_user.jpg';
        return  Yii::$app->urlManager->createAbsoluteUrl(['/']) . 'uploads/profile/' . $profile_pic;
    }

    /**
     * Process upload of profile picture
     *
     * @return mixed the uploaded profile picture instance
     */
    public function uploadProfilePicture() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, '_avatar');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        //$this->filename = $image->name;
        $arr = explode(".", $image->name);
        $ext = end($arr);

        // generate a unique file name
        $this->photo = Yii::$app->security->generateRandomString().".{$ext}";

        // the uploaded profile picture instance
        return $image;
    }
    public static function getAgeFromBirth($birthday)
    {
        $now = new \DateTime();
        $b = new \DateTime($birthday);
        $interval = $now->diff( $b );
        $age = $interval->y;
        return $age;
    }

    public function getName()
    {
        return $this->getAttribute('name');
    }

    public static function getFullList() {
        $models =  self::find()->all();

        $arr = ArrayHelper::map($models,'user_id','name');
        $arr[0] = 'Не выбран';
        ksort($arr);

        return $arr;
    }
    public  function getFullListSelect2($case_id) {
        $models =  self::find()->all();

        $arr = ArrayHelper::map($models,'user_id','name');
        $case = Opening::findOne($case_id);
        /*if($case){
            foreach($arr as $k => $val){
                foreach($case->users as $user){
                    if($k == $user->getId()){
                        unset($arr[$k]);
                    }

                }
            }
        }  */
        return $arr;
    }



    public function getItems() : ActiveDataProvider
    {
        $query = new \yii\db\Query();

      /*  $query->from(['i' => 'item'])
            ->leftJoin(['oi' => 'opening_item'],'`i`.`id` = `item_id`')
            ->select(['`i`.`id` as item_id,`i`.`internal_name` as internal_name ,`i`.`icon` as icon , `oi`.`case_id`, `oi`.`price`'])
            ->where(['user_id' => $this->user_id])
        ; */

        $query->from(['oi' => 'opening_item'])
            ->leftJoin(['o' => 'opening'],'`oi`.`case_id` = `o`.`id`')
            ->select(['`o`.`id` as case_id,`o`.`price` as price'])
            ->where(['`o`.`user_id`' => $this->user_id]);
        $q = $query->createCommand()->getRawSql();


        $dataProvider = new ActiveDataProvider([

            'query' => $query,

            'pagination' => [
                'pageSize' => 9,
            ],
        ]);
        return $dataProvider;
    }

    public function getBestDrop($dataProvider)
    {
        if(!$dataProvider){
            return [];
        }
        $arr = $dataProvider->getModels();


        usort($arr, function ($item1, $item2) {
            return $item2['price'] <=> $item1['price'];
        });
        return !empty($arr) ? $arr[0] : null;


    }
    public function getBestDropPhoto($array)
    {
        if(empty($array)){
            return  '/uploads/photo/default.png';
        }
        $icon =  $array['icon'] ? $array['icon'] : '/uploads/photo/default.png';
        $icon = str_replace('public', 'original', $icon);
        return $icon;

    }
    public function getBestDropName($array)
    {
        if (empty($array)) {
            return 'Не задано';
        }

        return $array['internal_name'] ? $array['internal_name'] : 'Не задано';

    }



}


   

    


