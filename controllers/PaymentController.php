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
                $payment = $model->payment;
                $sign = $model->addSign();
                $client = new \GuzzleHttp\Client([
                    // Base URI is used with relative requests
                    'base_uri' => 'https://payok.io/',
                    // You can set any number of default request options.
                    'timeout' => 60,
                    'debug' => false,
                ]);
                $request = $client->request('GET', 'pay', [
                    'query' => [
                        'amount' => $model->amount,
                        'payment' => $model->payment,
                        'desc' => $model->desc,
                        'sign' => $sign,
                        'method' => $model->method,
                       // 'email' => $model->email,
                    ],
                    'timeout' => 120,
                ]);



                $r =  json_decode($request->getBody()->getContents(), true);

                var_dump("Redirecting");
                exit;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}