<?php

namespace app\controllers;

use app\models\Item;
use app\modules\mng\models\OpeningItem;
use yii\data\ActiveDataProvider;

class ItemController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user_id = \Yii::$app->user->getId();

        $query = (new \yii\db\Query())->select(['item.id', 'item.market_hash_name', 'item.type', 'item.is_gold', 'item.icon_url', 'opening_item.price', 'opening_item.id as oi_id', 'opening_item.status as status', 'opening_item.case_id as case_id', 'opening_item.is_sold as is_sold',  'item.rarity', 'item.exterior'])->from('item')->innerJoin('opening_item', 'item.id = opening_item.item_id')->where(['opening_item.user_id'=> \Yii::$app->user->id])->orderBy(["opening_item.id" => SORT_DESC]);


        $myScinsDataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 150,
            ],
        ]);

        $query = Item::find()->where(['>',
           'price', 1.23
        ]);

        if(\Yii::$app->request->isAjax){
            $post = $_POST;
            $query = Item::find()->where(['>',
                'price', $_POST['price'] * 1.23
            ])->andWhere(['<',
                'price', $_POST['price'] * 10
            ]);

        }

        $allScinsDataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 50,
            ],
        ]);

        $m = $allScinsDataProvider->getModels();


        return $this->render('index', [
            'myScinsDataProvider' => $myScinsDataProvider,
            'allScinsDataProvider' => $allScinsDataProvider,
        ]);
    }


    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }


    public function actionUpgrade()
    {
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            $session = \Yii::$app->session;

            if(isset($session['upgrade'])){

                $session->open();
                $chance = isset($session['upgrade']['chance']) ? $session['upgrade']['chance'] : 0;
                $win = (new Item())->getWinner($chance);

                if ($win == 1) {
                    $item_id = $session['upgrade']['oi_to'];
                    $price = $session['upgrade']['price_to'];
                    $model = new OpeningItem();
                    $model->price = $price;
                    $model->item_id = intval($item_id);
                    $model->user_id = intval(\Yii::$app->user->id);
                    $model->save(false);
                } else {
                    $oi = OpeningItem::findOne($session['upgrade']['oi_id']);
                    $oi->delete();
                }


                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                \Yii::$app->response->statusCode = 200;
                $session->close();
                return [
                    'success',
                    'win' => $win,
                    'chance' => $chance

                ];

            }
        }

    }


    public function actionSetUpgrade()
    {
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            $session = \Yii::$app->session;
            $direction = 0;

            if(isset($_POST['oi_id_to'])){
                $direction = 1;
            }
            $session->open();

            $session['upgrade'] = [
                'oi_from' => isset($_POST['oi_id']) ? intval($_POST['oi_id']) : (isset($session['upgrade']['oi_from']) ? $session['upgrade']['oi_from'] : null),
                'oi_to' => isset($_POST['oi_id_to'])? intval($_POST['oi_id_to']) : (isset($session['upgrade']['oi_to']) ? $session['upgrade']['oi_to'] : null),
                'chance' => null,
            ];

            if(isset($session['upgrade']['oi_from'])) {

                $item_from = OpeningItem::find()->where(['id' => $session['upgrade']['oi_from']])->one();
                $item_item_from = Item::findOne($item_from->item_id);

                $img_from = $item_item_from ? $item_item_from->icon_url : null;

                $session['upgrade'] = [
                    'oi_from' => isset($session['upgrade']['oi_from']) ? $session['upgrade']['oi_from'] : null,
                    'oi_to' => isset($session['upgrade']['oi_to']) ? $session['upgrade']['oi_to'] : null,
                    'chance' => null,
                    'img_from' => $img_from,
                ];
            }
            $img_to = null;
            if(isset($session['upgrade']) && isset($session['upgrade']['oi_from']) && isset($session['upgrade']['oi_to'])) {
                if($session['upgrade']['oi_from'] == null || $session['upgrade']['oi_to'] == null ) {
                    $session->close();
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    \Yii::$app->response->statusCode = 200;
                    return [
                        'success',
                    ];
                }

                $item_to =  Item::find()->where(['id' => $session['upgrade']['oi_to']])->one();
                $img_to = $item_to->icon_url;
                $price_to = $item_to->updatePrice($item_to->market_hash_name);

                $chance = round((($item_from->price / $price_to) * 91.8), 2);
                $session['upgrade'] = [
                    'oi_from' => $session['upgrade']['oi_from'],
                    'oi_to' => $session['upgrade']['oi_to'],
                    'chance' => $chance,
                    'img_from' => $img_from ? $img_from : null,
                    'img_to' => $img_to ? $img_to : null,
                    'price_to' =>  $price_to


                ];
            }


            $session->close();
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            \Yii::$app->response->statusCode = 200;
            return [
                'success',
                'chance' => isset($session['upgrade']['chance']) ? $session['upgrade']['chance'] : null,
                'img_from' => $img_from ? $img_from : null,
                'img_to' => $img_to ? $img_to : null,
                'direction' => $direction,
                'price_to' => $direction ? $price_to : null

            ];
        }

    }


}
