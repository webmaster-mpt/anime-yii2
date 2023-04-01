<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Anime;

/**
 * AnimeSearch represents the model behind the search form of `common\models\Anime`.
 */
class AnimeSearch extends Anime
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count_parts'], 'integer'],
            [['type', 'key_anime_m', 'name_m'], 'safe'],
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
        $query = Anime::find();

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
            'count_parts' => $this->count_parts
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'key_anime_m', $this->key_anime_m])
            ->andFilterWhere(['like', 'name_m', $this->name_m]);

        return $dataProvider;
    }
}
