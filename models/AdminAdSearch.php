<?php


namespace app\models;

use yii\data\ActiveDataProvider;

/**
 * Class AdminAdSearch
 * @package app\models
 */
class AdminAdSearch extends AdSearch
{
    public function search($params)
    {
        $query = Ad::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'title' => SORT_ASC,
                ]
            ],
        ]);




        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->innerJoin('userform', 'userform.user_id = ad.user_id');
        if($this->city_id){
            $query->andWhere(['userform.city_id' => $this->city_id]);

        }
        if($this->sex != 0){
            $query->andWhere(['userform.sex' => $this->sex]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        $q = $query->createCommand()->getRawSql();
        return $dataProvider;
    }

}