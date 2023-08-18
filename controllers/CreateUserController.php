<?php


namespace app\controllers;

use app\models\Item;
use app\models\Profile;
use app\models\User;
use app\modules\mng\models\MarketOrder;
use app\modules\mng\models\OpeningItem;
use app\modules\mng\models\Upgrade;
use yii\web\Controller;

/**
 * Class CreateUserController
 *
 * @package app\controllers
 */
class CreateUserController extends Controller
{
    public function actionIndex()
    {
        $client = new \GuzzleHttp\Client([
            'timeout' => 60,
            'debug' => false,
        ]);
        $request = $client->request('GET', 'https://steamcommunity.com/inventory/76561198998658215/730/2', [

            'timeout' => 120,
        ]);
        //



        $r =  json_decode($request->getBody()->getContents(), true);
        if(!$r){
            var_dump($request);
            exit;

        }
        foreach ($r['descriptions'] as $k=> $val){
            $item = new Item();
            $item->appid = isset($val['appid']) ? $val['appid'] : null;
            $item->classid = isset($val['classid']) ? $val['classid'] : null;
            $item->instanceid = isset($val['instanceid']) ? $val['instanceid'] : null;
            $item->background_color = isset($val['background_color']) ? $val['background_color'] : null;
            $item->currency = isset($val['currency']) ? $val['currency'] : null;
            $item->icon_url = isset($val['icon_url']) ? $val['icon_url'] : null;
            $item->icon_url_large = isset($val['icon_url_large']) ? $val['icon_url_large'] : null;
            $item->name = isset($val['name']) ? $val['name'] : null;
            $item->market_hash_name = isset($val['market_hash_name']) ? $val['market_hash_name'] : null;
            $item->type = isset($val['type']) ? $val['type'] : null;
            if (isset($val['descriptions'])) {
                if(!empty($val['tags'])){
                    foreach ($val['tags'] as $tag){
                        if(isset($tag['category']) && $tag['category'] == 'Rarity' ){
                            $item->rarity = $tag['internal_name'];
                        }
                        if(isset($tag['category']) && $tag['category'] == 'Exterior' ){
                            $item->exterior = $tag['localized_tag_name'];
                        }
                    }

                }

            }
            $item->save(false);

        }

    }

    public function actionInternal()
    {
       /* $row = (new \yii\db\Query())
            ->select(['rarity', 'exterior', 'market_hash_name', 'id'])
            ->from('item_init')
            ->where(['item_id' =>(int)$id ])
            ->andWhere(['case_id' =>(int)$this->id ])
            ->andWhere(['price' => $this->price ])
            ->one();


        foreach($this->user_ids as $user_id){
            \Yii::$app->db->createCommand("UPDATE opening_item SET user_id=:user_id WHERE case_id=:case_id AND item_id=:item_id AND id=:row_id IS NULL AND price=:price",
                [
                    ':user_id' => $user_id,
                    ':case_id' => $this->id,
                    ':item_id' => $id,
                    ':row_id' => intval($row['id']) ,
                    ':price' => $this->price,
                ])
                ->execute();
        }
        return true; */
    }


    public function actionPrice()
    {
        $items = Item::find()->all();
        $client = new \GuzzleHttp\Client([
            'timeout' => 60,
            'debug' => false,
        ]);
        $request = $client->request('GET', 'https://market.csgo.com/api/v2/prices/RUB.json', [

            'timeout' => 120,
        ]);
        //

        $r =  json_decode($request->getBody()->getContents(), true);

        foreach ($items as $item){
            $name = $item->market_hash_name;


            if(isset($r['items']) && !empty($r['items'])) {
                $arr = [];
                foreach ($r['items'] as $k=>$val){
                    if(isset($val['market_hash_name']) && $val['market_hash_name'] == $item->market_hash_name){
                        $arr[] = $val['price'];
                    }

                }

                if(!empty($arr)){
                    ksort($arr);
                    $i = 0;
                    $item->currency = $r['currency'];
                    $item->price = isset($arr[$i]) ? $arr[$i] : null;

                    $item->internal_name = $item->name .'_'. '(' . $item->id.')' .'_' .strval($arr[$i]). '(' . $r['currency'].')' . '_' . $item->rarity;
                   // echo $item->internal_name  . '<br>';
                    $item->save(false);


                } else {
                   // echo "NO data for item" . '' . $item->market_hash_name . '<br>';
                }
            }

        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->response->statusCode = 200;
        return [
            'success',
        ];

    }

    public function actionInternalName()
    {
        $items = Item::find()->all();
        foreach ($items as $k=>$item){
            $item->internal_name =  $item->market_hash_name .'_'. '(' . $item->id.')' .'_' .strval($item->price). '(RUB)' . '_' . $item->rarity;
            $item->save(false);
        }
        die("OK");

    }

    public function actionAll()
    {
        ini_set('memory_limit', '-1');
        $client = new \GuzzleHttp\Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://www.steamwebapi.com/steam/api/',
            // You can set any number of default request options.
            'timeout' => 60,
            'debug' => false,
        ]);
        $request = $client->request('GET', 'items', [
            'query' => [
                //    'steam_id' => '76561199524928583',
                'game' => 'csgo',
                'language' => 'english',
                'parse' => true,
                'key' => 'WLGV4TNW0ETBU5SN',
            ],
            'timeout' => 300,
        ]);





        $r =  json_decode($request->getBody()->getContents(), true);
        //[{
        //	"id": "00014c0a-7b56-446d-b04f-43be5758f031",
        //	"count": null,
        //	"assetId": null,
        //	"classId": null,
        //	"instanceId": null,
        //	"marketHashName": "Souvenir FAMAS | Teardown (Minimal Wear)",
        //	"marketName": "Souvenir FAMAS | Teardown (Minimal Wear)",
        //	"hashId": "a016bd34ec6c7dba786a52bd8e520f07",
        //	"nameId": 2388371,
        //	"color": null,
        //	"borderColor": "#FFD700",
        //	"type": "Souvenir FAMAS",
        //	"rarity": null,
        //	"quality": null,
        //	"marketable": null,
        //	"tradable": null,
        //	"price": "32.13",
        //	"priceLatest": "31.78",
        //	"priceMedian": "32.42",
        //	"priceSafe": "35.11",
        //	"priceAvg": "35.11",
        //	"priceMin": "31.78",
        //	"priceMax": "40.49",
        //	"priceSafeTs7D": "0.00",
        //	"priceSafeTs24H": "0.00",
        //	"priceSafeTs30D": "31.78",
        //	"priceSafeTs90D": "35.11",
        //	"buyOrderPrice": "32.13",
        //	"sellOrderPrice": "205.80",
        //	"buyOrderQuantity": 1,
        //	"sellOrderQuantity": 1,
        //	"sold7D": "0",
        //	"sold24H": "0",
        //	"sold30D": "1",
        //	"sold90D": "3",
        //	"slug": "souvenir-famas-teardown-minimal-wear",
        //	"itemImages": ["https:\/\/community.cloudflare.steamstatic.com\/economy\/image\/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLuoKhRfwOP3fDhR5OO-m5S0lvnwDLjemm9u5Mx2gv2P9tWmiQPk-xE-YDqlINKUdgQ6YAzTqVm9xuvpjMS5u5zPwXcxunIg7GGdwUK4xWYQ4w"],
        //	"wear": "mw",
        //	"insertId": 2928,
        //	"tag": [],
        //	"steamPrice": 3178,
        //	"createdAt": "2023-01-26T04:00:21+00:00",
        //	"deletedAt": null,
        //	"unstable": true,
        //	"unstableReason": "LOW_SALES_3PLUS_MONTHS",
        //	"statTrack": false,
        //	"dailySoldVolume": null,
        //	"firstSeenTime": "1385769603717",
        //	"isCase": false,
        //	"isKey": false,
        //	"isGraffiti": false,
        //	"isSticker": false,
        //	"itemGroup": null,
        //	"isStar": false,
        //	"actions": null,
        //	"marketActions": null,
        //	"descriptions": null,
        //	"marketTradableRestriction": null,
        //	"tags": null,
        //	"inspectLink": null,
        //	"updatedAt": "2023-08-01T11:20:34+00:00"
        //}]
        foreach ($r as $k=> $val){

            if($k < 10000){
                continue;
            }

            if(!$val['classId']){
                continue;
            }

            $item = new Item();
            $item->appid = '730';
            $item->steam_id = isset($val['id']) ? $val['id'] : null;
            $item->classid = isset($val['classId']) ? $val['classId'] : null;
            $item->instanceid = isset($val['instanceId']) ? $val['instanceId'] : null;
          //  $item->background_color = isset($val['background_color']) ? $val['background_color'] : null;
        //    $item->currency = isset($val['currency']) ? $val['currency'] : null;
           // $item->icon_url = isset($val['itemImages']) ? $val['itemImages'] : null;
            if(isset($val['itemImages'])){
                foreach($val['itemImages'] as $img){
                    $item->icon_url = $img;
                }
            }

        //    $item->icon_url_large = isset($val['icon_url_large']) ? $val['icon_url_large'] : null;
            $item->name = isset($val['marketName']) ? $val['marketName'] : null;
            $item->market_hash_name = isset($val['marketHashName']) ? $val['marketHashName'] : null;
            $item->type = isset($val['type']) ? $val['type'] : null;
            $item->exterior = isset($val['wear']) ? $val['wear'] : null;
            $item->rarity = isset($val['rarity']) ? $val['rarity'] : null;
            $item->price = isset($val['priceMin']) ? $val['priceMin'] : null;
            if (isset($val['tags'])) {
                if(!empty($val['tags'])){
                    foreach ($val['tags'] as $tag){
                        if(isset($tag['category']) && $tag['category'] == 'Rarity' ){
                            $item->rarity = $tag['internal_name'];
                        }
                        if(isset($tag['category']) && $tag['category'] == 'Exterior' ){
                            $item->exterior = $tag['localized_tag_name'];
                        }
                    }

                }

            }
            $item->save(false);

        }
        die("all");
    }

    public function actionUpgrade()
    {
        $items = OpeningItem::find()->where(['upgrade_status' => OpeningItem::UPGRADE_STATUS_SUCCESS ])->all();

        foreach ($items as $item){
            $up = new Upgrade();
            $up->user_id = $item->user_id;
            $up->price = $item->price;
            $up->item_id = $item->id;
            $up->status = OpeningItem::UPGRADE_STATUS_SUCCESS;
            $up->save(false);
        }
        die('updated');

    }



    public function actionUpgradeStatus()
    {
        $items = OpeningItem::find()->all();

        foreach ($items as $item){
            if($item->case_id == 0){
                $item->upgrade_status = OpeningItem::UPGRADE_STATUS_SUCCESS;
            } else {
                $item->upgrade_status = OpeningItem::UPGRADE_STATUS_NONE;
            }
            $item->save(false);
        }
        die('updated');

    }

    public function actionCountMarket()
    {
        $users = Profile::find()->asArray()->all();
        foreach ($users as $user){
            $user_id = $user['user_id'];
            $q = 'SELECT COUNT(*), id, user_id, item_id FROM market_order WHERE user_id=' . intval($user_id) . ' GROUP BY item_id;';
            $counts = \Yii::$app->db->createCommand($q)->queryAll();
            if(!empty($counts)){
                foreach($counts as $count){
                    $ops =   MarketOrder::find()->where(['item_id' => $count['item_id'], 'user_id'=> $count['user_id']])->all();
                    if($ops){
                        foreach($ops as $op){
                            $op->count = intval($count['COUNT(*)']);
                            $op->save();
                        }

                    }

                }

            }
        }
        die('HEHE');


    }


    public function actionCount()
    {
        $users = Profile::find()->asArray()->all();
        foreach ($users as $user){
           $user_id = $user['user_id'];
            $q = 'SELECT COUNT(*), id, user_id, item_id FROM opening_item WHERE user_id=' . intval($user_id) . ' GROUP BY item_id;';
            $counts = \Yii::$app->db->createCommand($q)->queryAll();
            if(!empty($counts)){
               foreach($counts as $count){
                 $ops =   OpeningItem::find()->where(['item_id' => $count['item_id'], 'user_id'=> $count['user_id']])->all();
                 if($ops){
                     foreach($ops as $op){
                         $op->count = intval($count['COUNT(*)']);
                         $op->save();
                     }

                 }

               }


            }
        }
        die('HEHE');


    }

    public function actionGetRarity()
    {

        $rows = Item::find()
            ->where(['like', 'market_hash_name','%'. 'Knife' . '%', false])
            ->orWhere(['like', 'market_hash_name','%'. 'Gloves' . '%', false])
            ->all();

        foreach ($rows as $row){
            $row->is_gold = 1;
            $row->save(false);
        }
        die("YES");

    }



    public function actionGetPrice($name)
    {
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
                if(isset($val['market_hash_name']) && $val['market_hash_name'] == $name){
                    $arr[] = $val['price'];

                }
            }

            if(!empty($arr)){
                ksort($arr);
                $i = 0;
                if(!isset($arr[$i])){
                    echo "NO data IN item" . '' . $name . '<br>';
                    var_dump($arr);
                    exit;
                }

            } else {
                echo "NO data for item" . '' . $name . '<br>';
            }
        }
        var_dump($arr);
        exit;
    }

}

