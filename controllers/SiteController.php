<?php

namespace app\controllers;

use app\models\Ad;
use app\models\AdminLoginForm;
use app\models\AdSearch;
use app\models\Client;
use app\models\ContactForm;
use app\models\LightOpenID;
use app\models\Profile;
use app\models\User;
use dektrium\user\models\RegistrationForm;
use SteamWebApi\SteamWebApi;
use Yii;
use yii\authclient\OpenId;
use yii\base\InvalidConfigException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\old;
use Ziganshinalexey\Yii2SteamOpenIdAuth\actions\SteamAuthAction;
use Ziganshinalexey\Yii2SteamOpenIdAuth\traits\SteamApiComponentTrait;

class SiteController extends Controller
{

    public $validation_key = 'asdas5fdwer38iyeuit4ueh';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'steam'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['steam'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],


                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],

        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {


        return $this->render('index', [

        ]);
    }
    public function actionSteam()
    {
        try {
            $openid = new LightOpenID(Yii::$app->params['domain']);
            if (!$openid->mode) {
                $openid->identity = 'http://steamcommunity.com/openid/?l=russian';
                header('Location: ' . $openid->authUrl());
            } elseif ($openid->mode == 'cancel') {
                header('Location: /'); // здесь можно редиректить пользователя, если он начал процесс авторизации через steam, но отказался от него
            } elseif ($openid->validate()) {
                $id = $openid->identity;
                $sid64 = intval(preg_replace('/[^0-9]/', '', $id));
                $profile = Profile::find()->where(['steam_id' => $sid64])->one();
                $key = Yii::$app->params['steam_api_key'];


                $client = new \GuzzleHttp\Client();


                $response = $client->request('GET', 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $key . '&steamids=' . $sid64, [
                    'headers' =>
                        [
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                        ],
                ]);

                if (!($profile)) {
                    $user = new User();
                    $user->username = '';
                    $user->save(false);
                    $profile = Profile::find()->where(['user_id' => $user->id])->one();
                }

                $res = json_decode((string)$response->getBody(), true);

                if ($res && isset($res['response']['players'][0])) {
                    $data = $res['response']['players'][0];
                    $profile->name = $data['personaname'];
                    $profile->photo = $data['avatar'];
                    $profile->photo_full = $data['avatarfull'];
                    $profile->status = $data['personastate'];
                    $profile->visibility = $data['communityvisibilitystate'];
                }
                $profile->steam_id = $sid64;
                $profile->save(false);



                $user = User::find()->where(['id' => $profile->user_id])->one();
                $model = new LoginForm();
                $model->user = $user;
                $model->login();
                // после вашего кода нужно редиректнуть пользователя на нужную вам страницу сайта
                return $this->redirect([
                    'site/index',
                ]);
            } else {
                header('Location: /');
            }
        } catch (\ErrorException $e) {
            header('Location: /');
        }
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionCreate()
    {
        return $this->redirect( [
            'ad/create'
        ]);
    }


    public function actionView($id)
    {
        $model = Ad::findOne($id);
        $userform = \app\models\Userform::find()->where(["user_id" => $model->user_id])->one();
        $model->username = $userform && $userform->first_name ? $userform->first_name  : "Не задано";
        $model->link = $model->getProfileAttribute('vk_link');
        $model->sex_name =  $userform && isset(Profile::$sex_list[$userform->sex]) && $userform->sex != 0 ? Profile::$sex_list[$userform->sex] : 'Не задано';
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionInventory()
    {
        $client = new \GuzzleHttp\Client();
        $key = Yii::$app->params['steam_api_key'];

        $response = $client->request('GET', 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='.$key.'&steamids=' . 76561199524928583, [
            'headers' =>
                [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
        ]);
        $res = json_decode((string)$response->getBody(), true);

        //https://steamcommunity.com/profiles/76561199524928583/inventory/json/730/2 private
        $url = "http://api.steampowered.com/IEconItems_730/GetPlayerItems/v0001/?key=".$key."&format=json&SteamID=76561199524928583";
            //76561199524928583
        $response = $client->request('GET', $url);
        //http://api.steampowered.com/IEconItems_<ID>/GetPlayerItems/v0001/
        //SteamID
        //https://partner.steam-api.com/IInventoryService/GetInventory/v1/
        $sid64 = 76561199524928583;
       // $res = file_get_contents("https://partner.steam-api.com/IInventoryService/GetInventory/v1/?key=81BC68E11726D3E38D6192B6E2DCE31E&appid=730&steamid=76561199524928583");



       $res = json_decode((string)$response->getBody(), true);
        $r = $res;

    }

    public function actionPackage()
    {
        $key = "TSZI1ZF43Y1KA27E";

        $steamWebApi = new SteamWebApi($key);

        // Get Inventory
        $res =   $steamWebApi->getInventory('76561199524928583');
      $res2 =   $steamWebApi->getInventoryWorth('76561199524928583');
        $r = $res;
        // Get Inventory And Worth

    }

    public function actionItems()
    {
        $client = new \GuzzleHttp\Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://www.steamwebapi.com/steam/api/',
            // You can set any number of default request options.
            'timeout' => 60,
            'debug' => false,
        ]);
        $request = $client->request('GET', 'inventory', [
            'query' => [
                'steam_id' => '76561199524928583',
                'game' => 'csgo',
                'language' => 'english',
                'parse' => true,
                'key' => 'TSZI1ZF43Y1KA27E',
            ],
            'timeout' => 120,
        ]);

        $r =  json_decode($request->getBody()->getContents(), true);

        $request = $client->request('GET', 'items', [
            'query' => [
                'steam_id' => '76561199524928583',
                'game' => 'csgo',
                'language' => 'english',
                'parse' => true,
                'key' => 'TSZI1ZF43Y1KA27E',
            ],
            'timeout' => 120,
        ]);

        $r =  json_decode($request->getBody()->getContents(), true);
        $a = $r;
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAgreement()
    {
        return $this->render('agreement');
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $ghost_email = Yii::$app->request->post('email');
        if (!empty($ghost_email)) {
            Yii::$app->session->setFlash('danger', 'Доступ запрещен. Вы не прошли защиту от ботов');
            return $this->refresh();
        }
        $validation_key = Yii::$app->request->post('validation_key');
        if (Yii::$app->request->isPost && ($validation_key != $this->validation_key)) {
            Yii::$app->session->setFlash('danger', 'Доступ запрещен. Вы не прошли защиту от ботов. Проверьте, включен ли в вашем браузере javascript');
            return $this->refresh();
        }

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['contactEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
