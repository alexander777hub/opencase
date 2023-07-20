<?php


namespace app\controllers;

use app\models\PayokOrder;
use app\modules\mng\models\Opening;
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
                    $payment = intval($model->payment),
                    $shop =  intval($model->shop),
                    $currency = $model->currency,
                    $desc = $model->desc,
                    $secret = \Yii::$app->params['payok_key'] //Узнайте свой секретный ключ в личном кабинете

                ];

                // Соединение массива в строку и хеширование функцией md5
                $sign = md5(implode('|', $array));

                $url = 'https://payok.io/pay?amount='. intval($model->amount). '&payment='. intval($model->payment). '&shop='. intval($model->shop). '&currency='. $model->currency. '&method='. $model->method. '&desc='. $model->desc. '&sign='. $sign;

                return $this->redirect($url);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}