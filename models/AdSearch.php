<?php

namespace app\models;

use app\models\Ad;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * AdSearch represents the model behind the search form of `app\models\Ad`.
 */
class AdSearch extends Ad
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'type', 'sex', 'age', 'user_id'], 'integer'],
            [['created_at', 'city_id', 'title', 'updated_at', 'description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
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
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->innerJoin('userform', 'userform.user_id = ad.user_id');
        $query->where(['ad.status'=> Ad::STATUS_APPROUVED]);
        if($this->city_id){
            /*$profiles = Profile::find()->where(['city_id'=> $this->city_id])->asArray()->all();
            $keys = array_column($profiles, 'user_id');
            if(!$keys){
                $query->where('0=1');
                return $dataProvider;
            }
            $query->andFilterWhere(['user_id' => $keys]);*/
           // $query->andFilterWhere(['city_id' => intval($this->city_id)]);
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
