<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `app\models\Profile`.
 */
class ProfileSearch extends Profile
{
    public $min_age;
    public $max_age;
/*    public $tag_id;
    public $is_consultant;
    public $manager_id;
    public $agency_id;*/
    //public $tags;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','city_id'], 'integer'],
            [['photo','credit','birthday'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Profile::find();

        // add conditions that should always apply here
        //var_dump($query->prepare(\Yii::$app->db->queryBuilder)->createCommand()->rawSql);
        //exit();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['user_id' => SORT_DESC]]
        ]);

        $this->load($params);
        //var_dump($params);exit();

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'sex' => $this->sex,
            'city_id' => $this->city_id,
           // 'status' => $this->status,
            
        ]);


        $query->andFilterWhere(['like', 'bio', $this->bio])
            ;
        //echo print_r($query); exit;

        return $dataProvider;
    }
}
