<?php


namespace app\controllers;

use app\models\Profile;
use app\modules\mng\models\MarketOrder;
use app\modules\mng\models\OpeningItem;
use app\modules\mng\models\Task;
use GuzzleHttp\Exception\ClientException;
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
            if (!isset($post['item_id']) || !isset($post['user_id']) || !isset($post['price']) || !isset($post['oi_id'])) {
                return;
            }




            $profile = Profile::find()->where(['user_id' => intval($post['user_id'])])->one();
           /* var_dump($profile->credit);
            var_dump(floatval($post['price']));
            var_dump(($profile->credit + floatval($post['price'])));
            exit; */
            $profile->credit = $profile->credit + floatval($post['price']);

            $profile->save(false);

            $q = 'UPDATE `opening_item` SET is_sold=1 WHERE
                    `opening_item`.`id` = ' . intval($post['oi_id']) . '
                     ';
            /*$q = 'DELETE FROM `opening_item` WHERE
                    `opening_item`.`user_id` = ' . intval($post['user_id']) . ' AND   `opening_item`.`item_id` = ' . intval($post['item_id']) . '
                     '; */
            \Yii::$app->db->createCommand($q)->execute();


            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            \Yii::$app->response->statusCode = 200;
            return [
                'success',
                'profile_credit' => round($profile->credit, 2),
                'item_id' => $post['item_id'],
            ];
        }

    }

    public function actionMarket()
    {
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            $post = $_POST;
            if (!isset($post['item_id']) || !isset($post['user_id']) || !isset($post['oi_id'])) {
                return;
            }


            $market_hash_name =$post['market_hash_name'];

            $price1 = $this->actionUpdatePrice($market_hash_name);
            $price2 = (round($price1 + 1) * 100);


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
            $custom_id = strtotime("now") . '_' . \Yii::$app->user->getId();
            $url = 'https://market.csgo.com/api/v2/buy-for?key='.$key.'&hash_name='.$market_hash_name.'&price='.$price2.'&'.$partnerToken.'&custom_id='.$custom_id;
            $request = $client->request('GET', 'https://market.csgo.com/api/v2/buy-for?key='.$key.'&hash_name='.$market_hash_name.'&price='.$price2.'&'.$partnerToken.'&custom_id='.$custom_id, [

                'timeout' => 120,
            ]);
            //


            $r =  json_decode($request->getBody()->getContents(), true);
            $success = $r['success'];
            if($success){

                $order = new MarketOrder();
                $order->custom_id = $custom_id;
                $order->price = $r['price'];
                $order->item_id = $post['item_id'];
                $order->user_id = $post['user_id'];
                $order->status = 1;
                $order->oi_id = intval($post['oi_id']);
                $order->save(false);

                $opening_item = OpeningItem::find()->where(['id' => intval($post['oi_id'])])->one();
                $opening_item->status = 1;
                $opening_item->save(false);



            }
            $model = new Task();
            $model->frequency = 1;
            $model->save(false);

            $data =[
                'frequency'    => $model->frequency,


                'check_id'     => $custom_id];

            $client = new \GuzzleHttp\Client([
                'base_uri' =>  'http://127.0.0.1:8085/api/',
            ]);


            try {
                $response = $client->request('GET', 'tester/market' , [
                    'headers' => ['worker-access-token' => \Yii::$app->params['worker-access-token']],
                    'query' => $data
                ]);

                $rows = json_decode((string)$response->getBody(), true);

            } catch (ClientException $e) {
                \Yii::info('ERROR TASK MARKET');
               \Yii::info($e->getMessage());
            }

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


    public function actionCheckStatus($custom_id)
    {
        if(!$custom_id){
            return;
        }

        $order = MarketOrder::find()->where(['custom_id'=> $custom_id])->one();
        $oi = OpeningItem::findOne($order->oi_id);
        if(!$order){
            return;
        }
        $client = new \GuzzleHttp\Client([
            'timeout' => 60,
            'debug' => false,
        ]);

        $key = \Yii::$app->params['market-key'];
        $url = "https://market.csgo.com/api/v2/get-buy-info-by-custom-id?key=$key&custom_id=$custom_id";
        $request = $client->request('GET', "https://market.csgo.com/api/v2/get-buy-info-by-custom-id?key=$key&custom_id=$custom_id", [

            'timeout' => 120,
        ]);
        //

        $r =  json_decode($request->getBody()->getContents(), true);
        if(!$r['success']){
            return;
        }
        if($r['data']){
            $data =[
                'remove_id' => $custom_id,

            ];
            $client = new \GuzzleHttp\Client([
                'base_uri' =>  'http://127.0.0.1:8085/api/',
            ]);
            if(isset($r['data']['stage'])){

                switch ($r['data']['stage']) {
                    case 5:
                        try {
                            $response = $client->request('GET', 'tester/market' , [
                                'headers' => ['worker-access-token' => \Yii::$app->params['worker-access-token']],
                                'query' => $data
                            ]);

                            $rows = json_decode((string)$response->getBody(), true);

                        } catch (ClientException $e) {
                            \Yii::info('ERROR TASK MARKET');
                            \Yii::info($e->getMessage());
                        }
                        if($oi){
                            $oi->status = 5;
                        }
                        $order->status = 5;
                         break;
                    case 2:
                        try {
                            $response = $client->request('GET', 'tester/market' , [
                                'headers' => ['worker-access-token' => \Yii::$app->params['worker-access-token']],
                                'query' => $data
                            ]);

                            $rows = json_decode((string)$response->getBody(), true);

                        } catch (ClientException $e) {
                            \Yii::info('ERROR TASK MARKET');
                            \Yii::info($e->getMessage());
                        }
                        if($oi){
                            $oi->status = 2;
                        }
                        $order->status = 2;
                        break;
                    default:
                       break;
                }
                $order->save(false);
                $oi->save(false);
            }
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

                'timeout' => 300,
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