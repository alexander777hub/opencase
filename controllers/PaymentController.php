<?php


namespace app\controllers;

use app\models\CrystalOrder;
use app\models\PayokOrder;
use app\modules\mng\models\Opening;
use GuzzleHttp\Client;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Class PaymentController
 *
 * @package app\controllers
 */
class PaymentController extends \yii\web\Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index'],

                    'rules' => [
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            'roles' => ['@'],

                        ],
                    ],
                    'denyCallback' => function ($rule, $action) {
                        $this->redirect([ '/' ]);
                        return null;
                    }

                ],

            ]
        );
    }

    public function actionIndex()
    {
        $model = new PayokOrder();

        if ($this->request->isPost) {
            $model->addParams();
            if ($model->load($this->request->post()) && $model->validate()) {
                $model->save();
                $array = [
                    $amount = $model->amount,
                    $payment = $model->payment,
                    $shop =  intval($model->shop),
                    $currency = $model->currency,
                    $desc = $model->desc,
                    $secret = \Yii::$app->params['payok_key'] //Узнайте свой секретный ключ в личном кабинете

                ];

                // Соединение массива в строку и хеширование функцией md5
                $sign = md5(implode('|', $array));

                $url = 'https://payok.io/pay?amount='. $model->amount. '&payment='. $model->payment. '&shop='. intval($model->shop). '&currency='. $model->currency. '&method='. $model->method. '&desc='. $model->desc. '&sign='. $sign. '&user_id='. \Yii::$app->user->getId();

                return $this->redirect($url);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionCrystal()
    {
        if(\Yii::$app->user->isGuest){
            return $this->redirect('/');
        }
        $model = new CrystalOrder();

        if ($this->request->isPost) {
            $model->description = 'Balance replenishment';
            $model->lifetime = '20';
         //   $model->amount_currency = 'RUB';
            $model->user_id = \Yii::$app->user->getId();
            $model->type = 'topup';
            if ($model->load($this->request->post()) && $model->validate()) {
                $model->save();
                $client = new Client();
                $res = $client->request('POST', "https://api.crystalpay.io/v2/invoice/create/", [
                    'json' => [
                        'amount' => $model->amount,
                        'auth_login' => "updrop",
                        'auth_secret' => \Yii::$app->params['crystal_secret'],
                        'type' => 'topup',
                        'lifetime' => 20,
                        'extra' => [
                            'user_id' => $model->user_id,

                        ],
                        'callback_url' => 'https://updrop.ru/crystal/success',
                        'redirect_url' => 'https://updrop.ru',
                    ],
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                ]);
                $res = json_decode((string)$res->getBody(), true);
                $r = $res;

                if($res && isset($res['error']) && $res['error'] == false){
                    $model->payment = isset($res['id']) ? $res['id'] : null;
                    $model->link = isset($res['url']) ? $res['url'] : null;
                    $model->save(false);

                    return $this->redirect($res['url']);
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('crystal', [
            'model' => $model,
        ]);


    }
}