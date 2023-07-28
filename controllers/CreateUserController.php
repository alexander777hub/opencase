<?php


namespace app\controllers;

use app\models\Item;
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

        foreach ($items as $item){
            $name = $item->market_hash_name;
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
                    if(isset($val['market_hash_name']) && $val['market_hash_name'] == $item->market_hash_name){
                        $arr[] = $val['price'];

                    }
                }

                if(!empty($arr)){
                    ksort($arr);
                    $i = 0;
                    $item->currency = $r['currency'];
                    $item->price = isset($arr[$i]) ? $arr[$i] : null;
                    if(!isset($arr[$i])){
                        echo "NO data IN item" . '' . $item->id . '<br>';
                        var_dump($arr);
                        exit;
                    }


                    $item->internal_name = $item->name .'_'. '(' . $item->id.')' .'_' .strval($arr[$i]). '(' . $r['currency'].')' . '_' . $item->rarity;
                    $item->save(false);

                } else {
                    echo "NO data for item" . '' . $item->market_hash_name . '<br>';
                }
            }

        }
        die("Success");
        exit;

    }

}