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
}