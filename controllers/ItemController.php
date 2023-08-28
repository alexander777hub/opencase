<?php

namespace app\controllers;

use app\models\Item;
use app\modules\mng\models\OpeningItem;
use app\modules\mng\models\Upgrade;
use yii\data\ActiveDataProvider;

class ItemController extends \yii\web\Controller
{

    public $_params_ = [];
    public function actionIndex()
    {
        $user_id = \Yii::$app->user->getId();

        $query = (new \yii\db\Query())->select(['item.id', 'item.market_hash_name', 'item.type', 'item.is_gold', 'item.icon_url', 'opening_item.upgrade_status', 'opening_item.contract_status as status', 'opening_item.price', 'opening_item.id as oi_id', 'opening_item.status as status', 'opening_item.case_id as case_id', 'opening_item.is_sold as is_sold',  'item.rarity', 'item.exterior'])->from('item')->innerJoin('opening_item', 'item.id = opening_item.item_id')->where(['opening_item.user_id'=> \Yii::$app->user->id, 'opening_item.is_sold' => null, 'opening_item.status'=> null, 'opening_item.upgrade_status'=> [0,1]])->orderBy(["opening_item.id" => SORT_DESC]);

      
        $myScinsDataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 150,
            ],
        ]);

        $query = Item::find();

        if(\Yii::$app->request->isAjax){
            $session = \Yii::$app->session;
            $session->open();

            if(isset($session['upgrade']['oi_to'])){
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                \Yii::$app->response->statusCode = 200;
                $session->close();
                return [
                    'skip' => 1

                ];

            }

            $post = $_POST;
            $query = Item::find()->where(['>',
                'price', $_POST['price'] * 1.23
            ])->andWhere(['<',
                'price', $_POST['price'] * 10
            ]);
            $q = $query->createCommand()->getRawSql();

        } else {
            if(\Yii::$app->session->has('upgrade')){
                \Yii::$app->session->remove('upgrade');
            }
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
                $model = null;
                $session->open();
                $item_id = $session['upgrade']['oi_to'];
                $price = $session['upgrade']['price_to'];
                $chance = isset($session['upgrade']['chance']) ? $session['upgrade']['chance'] : 0;
                $win = (new Item())->getWinner($chance);
                $oi = OpeningItem::findOne($session['upgrade']['oi_from']);
                $upgrade = new Upgrade();
                $upgrade->user_id = intval(\Yii::$app->user->id);
                $upgrade->price = $price;
                $upgrade->item_id = intval($item_id);
                if ($win == 1) {
                    $model = new OpeningItem();
                    $model->price = $price;
                    $model->item_id = intval($item_id);
                    $model->user_id = intval(\Yii::$app->user->id);
                    $model->upgrade_status = OpeningItem::UPGRADE_STATUS_SUCCESS;
                    $model->case_id = 0;
                    $model->save(false);
                    $oi->upgrade_status = OpeningItem::UPGRADE_STATUS_REPLACED;
                    $upgrade->status = OpeningItem::UPGRADE_STATUS_SUCCESS;
                } else {
                    $oi->upgrade_status = OpeningItem::UPGRADE_STATUS_FAIL;
                    $upgrade->status = OpeningItem::UPGRADE_STATUS_FAIL;
                }
                $oi->save(false);
                $upgrade->save(false);
                if($model){
                    $model->upgrade_id = $upgrade->id;
                    $model->save(false);
                }




                $session->remove('upgrade');


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
            $img_from = null;
            $img_to = null;
            $price_to = null;
            $chance = null;

            if(isset($_POST['oi_id_to'])){
                $direction = 1;
            }
            $session->open();

            $session['upgrade'] = [
                'oi_from' => isset($_POST['oi_id']) ? intval($_POST['oi_id']) : (isset($session['upgrade']['oi_from']) ? $session['upgrade']['oi_from'] : null),
                'oi_to' => isset($_POST['oi_id_to'])? intval($_POST['oi_id_to']) : (isset($session['upgrade']['oi_to']) ? $session['upgrade']['oi_to'] : null),
                'chance' => null,
                'price_to' =>  isset($_POST['price_to'])? $_POST['price_to'] : (isset($session['upgrade']['price_to']) ? $session['upgrade']['price_to'] : null),
            ];
            $s = \Yii::$app->session->get('upgrade');


            if(isset($session['upgrade']['oi_from'])) {
                $item_from = OpeningItem::find()->where(['id' => $session['upgrade']['oi_from']])->one();
                $item_item_from = Item::findOne($item_from->item_id);

                $img_from = $item_item_from ? $item_item_from->icon_url : null;
                if(isset($session['upgrade']['oi_to']) && isset($session['upgrade']['price_to'])) {
                    $item_to =  Item::find()->where(['id' => $session['upgrade']['oi_to']])->one();
                    $img_to = $item_to->icon_url;
                    $price_to = $session['upgrade']['price_to'];

                    $chance = round((($item_from->price / $price_to) * 91.8), 2);

                }
                $session['upgrade'] = [
                    'oi_from' => isset($session['upgrade']['oi_from']) ? $session['upgrade']['oi_from'] : null,
                    'oi_to' => isset($session['upgrade']['oi_to']) ? $session['upgrade']['oi_to'] : null,
                    'chance' => $chance ? $chance : null,
                    'img_from' => $img_from,
                    'price_to' =>  isset($session['upgrade']['price_to']) ? $session['upgrade']['price_to'] : null,
                    'market_hash_name_to' =>  isset($session['upgrade']['market_hash_name_to']) ? $item_to->market_hash_name : null
                ];
            }

            if(isset($session['upgrade']) && isset($session['upgrade']['oi_from']) && isset($session['upgrade']['oi_to'])) {
                if($session['upgrade']['oi_from'] == null) {
                    $session->close();
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    \Yii::$app->response->statusCode = 200;
                    return [
                        'success',
                    ];
                }
                if($session['upgrade']['oi_to'] == null ){
                    $session->close();
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    \Yii::$app->response->statusCode = 200;
                    return [
                        'success',
                    ];
                }

                $item_to =  Item::find()->where(['id' => $session['upgrade']['oi_to']])->one();
                $img_to = $item_to->icon_url;
                $price_to = $session['upgrade']['price_to'];

                $chance = round((($item_from->price / $price_to) * 91.8), 2);
                $session['upgrade'] = [
                    'oi_from' => $session['upgrade']['oi_from'],
                    'oi_to' => $session['upgrade']['oi_to'],
                    'chance' => $chance,
                    'img_from' => $img_from ? $img_from : null,
                    'img_to' => $img_to ? $img_to : null,
                    'price_to' =>  $price_to,
                ];
            }
            $session->close();

            if(!isset($session['upgrade']['oi_from'])){
                $item_to =  Item::find()->where(['id' => $session['upgrade']['oi_to']])->one();
                $img_to = $item_to->icon_url;
                $price_to = $session['upgrade']['price_to'];;
                $query = (new \yii\db\Query())->select(['item.id', 'item.market_hash_name', 'item.type', 'item.is_gold', 'item.icon_url', 'opening_item.upgrade_status', 'opening_item.price', 'opening_item.id as oi_id', 'opening_item.status as status', 'opening_item.case_id as case_id', 'opening_item.is_sold as is_sold',  'item.rarity', 'item.exterior'])->from('item')->innerJoin('opening_item', 'item.id = opening_item.item_id')->where(['opening_item.user_id'=> \Yii::$app->user->id, 'opening_item.is_sold' => null, 'opening_item.status'=> null, 'opening_item.upgrade_status'=> 0]);
                $query->andWhere(['<',
                    'opening_item.price', $price_to / 1.23
                ])->andWhere(['>',
                    'opening_item.price', $price_to / 10
                ]);
                $query->orderBy(["opening_item.id" => SORT_DESC]);
                $q = $query->createCommand()->getRawSql();

                $myScinsDataProvider = new ActiveDataProvider([
                    'query' => $query,

                    'pagination' => [
                        'pageSize' => 50,
                    ],
                ]);



                $m = $myScinsDataProvider->getModels();
                $query = Item::find();
                $allScinsDataProvider = new ActiveDataProvider([
                    'query' => $query,

                    'pagination' => [
                        'pageSize' => 50,
                    ],
                ]);
                $session->open();
                $session['upgrade'] = [
                    'oi_from' => isset($session['upgrade']['oi_from']) ? $session['upgrade']['oi_from'] : null,
                    'oi_to' => isset($session['upgrade']['oi_to']) ? $session['upgrade']['oi_to'] : null,
                    'chance' => null,
                    'img_from' => $img_from,
                    'img_to' => $img_to,
                    'price_to' =>  $price_to,
                    'market_hash_name_to' => $item_to ? $item_to->market_hash_name : null
                ];
                $this->_params_ = $params = [
                    'allScinsDataProvider' => $allScinsDataProvider,
                    'myScinsDataProvider' => $myScinsDataProvider,
                    'hehe' => 'hehe'


                ];


                $session->close();
                return $this->render('index', $params);

            }

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
