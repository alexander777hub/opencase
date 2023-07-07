<?php


namespace app\models;

use yii\data\ActiveDataProvider;
use yii\helpers\Json;

/**
 * Class UserformAncetSearch
 * @package app\models
 */
class UserformAncetSearch extends UserformSearch
{
    public function search($params)
    {
        $query = Userform::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, "UserformAncetSearch");
        $dataProvider->query->where(['status' => 1]);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if($this->city_id){
            $query->andWhere(['city_id' => $this->city_id]);
        }
        if($this->target){
            $query->andWhere(['target' => Json::encode([$this->target])]);
        }
        $q = $dataProvider->query->createCommand()->getRawSql();

        return $dataProvider;
    }

}