<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Userform;

/**
 * UserformSearch represents the model behind the search form of `app\models\Userform`.
 */
class UserformSearch extends Userform
{


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'sex', 'height', 'weight', 'city_id', 'find_zone', 'ready_to_relocate', 'avatar_id'], 'integer'],
            [['target'], 'string'],
            [['first_name', 'second_name', 'soname', 'was_born','about_me', 'about_partner', 'comment', 'vk_link'], 'safe'],
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
        $query = Userform::find();

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
            'sex' => $this->sex,
            'height' => $this->height,
            'weight' => $this->weight,
            'city_id' => $this->city_id,
            'find_zone' => $this->find_zone,
            'ready_to_relocate' => $this->ready_to_relocate,
            'avatar_id' => $this->avatar_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'second_name', $this->second_name])
            ->andFilterWhere(['like', 'soname', $this->soname])
            ->andFilterWhere(['like', 'was_born', $this->was_born])
           // ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'about_me', $this->about_me])
            ->andFilterWhere(['like', 'about_partner', $this->about_partner])
            ->andFilterWhere(['like', 'vk_link', $this->vk_link])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
