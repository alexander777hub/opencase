<?php

namespace app\controllers;

use app\models\Item;
use yii\data\ActiveDataProvider;

/**
 * Class ContractController
 */
class ContractController extends \yii\web\Controller
{
    public $_params_ = [];
    public function actionIndex()
    {
        $user_id = \Yii::$app->user->getId();

        $query = (new \yii\db\Query())->select(['item.id', 'item.market_hash_name', 'item.type', 'item.is_gold', 'item.icon_url', 'opening_item.price', 'opening_item.id as oi_id', 'opening_item.status as status', 'opening_item.case_id as case_id', 'opening_item.is_sold as is_sold',  'item.rarity', 'item.exterior'])->from('item')->innerJoin('opening_item', 'item.id = opening_item.item_id')->where(['opening_item.user_id'=> \Yii::$app->user->id, 'opening_item.is_sold'=> null])->orderBy(["opening_item.id" => SORT_DESC]);

        $myScinsDataProvider = new ActiveDataProvider([
            'query' => $query,

            'pagination' => [
                'pageSize' => 150,
            ],
        ]);

        return $this->render('index', [
            'myScinsDataProvider' => $myScinsDataProvider,
        ]);
    }
}