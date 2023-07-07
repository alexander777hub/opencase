<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Influencer;

/**
 * InfluencerSearch represents the model behind the search form of `app\models\Influencer`.
 */
class InfluencerSearch extends Influencer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'platform', 'status', 'audience', 'user_id'], 'integer'],
            [['username'], 'safe'],
            [['engagement_rate'], 'number'],
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
        $query = Influencer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'platform' => $this->platform,
            'status' => $this->status,
            'audience' => $this->audience,
            'engagement_rate' => $this->engagement_rate,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
