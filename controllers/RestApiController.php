<?php


namespace app\controllers;

use app\models\Profile;
use yii\web\Controller;

/**
 * Class RestController
 *
 * @package app\controllers
 */
class RestApiController extends Controller

{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }


    public function actionSell()
    {
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            $post = $_POST;
            if (!isset($post['item_id']) || !isset($post['user_id']) || !isset($post['price'])) {
                return;
            }

            $q = 'DELETE FROM `opening_item` WHERE
                    `opening_item`.`user_id` = ' . intval($post['user_id']) . ' AND   `opening_item`.`item_id` = ' . intval($post['item_id']) . '
                     ';
            \Yii::$app->db->createCommand($q)->execute();


            $profile = Profile::find()->where(['user_id' => intval($post['user_id'])])->one();

            $profile->credit = $profile->credit + floatval($post['price']);

            $profile->save(false);


            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            \Yii::$app->response->statusCode = 200;
            return [
                'success',
                'profile_credit' => $profile->credit,
                'item_id' => $post['item_id'],
            ];
        }

    }

    public function actionMarket()
    {
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            $post = $_POST;
            if (!isset($post['item_id']) || !isset($post['user_id'])) {
                return;
            }


            $market_hash_name =$post['market_hash_name'];

            $price = $this->actionUpdatePrice($market_hash_name) * 100;

            $client = new \GuzzleHttp\Client([
                'timeout' => 60,
                'debug' => false,
            ]);
            $key = \Yii::$app->params['market-key'];
            $profile = Profile::find()->where(['user_id' => intval($post['user_id'])])->one();
            if(!$profile->trade_link){
                return;
            }
            $partnerToken = explode('?', $profile->trade_link)[1];
            $url = "https://market.csgo.com/api/v2/buy-for?key=$key&hash_name=$market_hash_name&price=$price&$partnerToken";
            $request = $client->request('GET', 'https://market.csgo.com/api/v2/buy-for?key='.$key.'&hash_name='.$market_hash_name.'&price='.$price.'&'.$partnerToken, [

                'timeout' => 120,
            ]);
            //

            $r =  json_decode($request->getBody()->getContents(), true);
            $success = $r['success'];
            $error = isset($r['error']) ? $r['error'] : null;
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            \Yii::$app->response->statusCode = 200;
            return [
                'success' => $success,
                'item_id' => $post['item_id'],
                'error' => $error

            ];
        }

    }





    public function actionGetPrice()
    {
        if(\Yii::$app->request->isAjax && \Yii::$app->request->isPost){
            $post = $_POST;
            if(!isset($post['market_hash_name'])){
                return;

            }

            $market_hash_name =$post['market_hash_name'];
            $price = $this->actionUpdatePrice($market_hash_name);


            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            \Yii::$app->response->statusCode = 200;
            return [
                'price' => $price
            ];
        }

        }


        public function actionUpdatePrice($market_hash_name){
            $client = new \GuzzleHttp\Client([
                'timeout' => 60,
                'debug' => false,
            ]);
            $request = $client->request('GET', 'https://market.csgo.com/api/v2/prices/RUB.json', [

                'timeout' => 120,
            ]);
            //

            $r =  json_decode($request->getBody()->getContents(), true);
            if(isset($r['items']) && !empty($r['items'])) {
                $arr = [];
                foreach ($r['items'] as $k=>$val){
                    if(isset($val['market_hash_name']) && $val['market_hash_name'] == $market_hash_name){
                        $arr[] = $val['price'];

                    }
                }

                if(!empty($arr)){
                    ksort($arr);
                    $i = 0;
                    if(!isset($arr[$i])){
                        echo "NO data IN item" . '' . $market_hash_name . '<br>';
                        var_dump($arr);
                        exit;
                    }

                } else {
                    echo "NO data for item" . '' . $market_hash_name . '<br>';
                }
            }
            $price = $arr[0];
            return $price;
        }


}