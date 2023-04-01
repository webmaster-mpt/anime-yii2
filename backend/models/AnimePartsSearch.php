<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AnimeParts;

/**
 * AnimePartsSearch represents the model behind the search form of `common\models\AnimeParts`.
 */
class AnimePartsSearch extends AnimeParts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number_p'], 'integer'],
            [['key_anime_p', 'name_anime_p', 'poster', 'path_n', 'source'], 'safe'],
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
        $query = AnimeParts::find();

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
            'number_p' => $this->number_p
        ]);

        $query->andFilterWhere(['like', 'key_anime_p', $this->key_anime_p])
            ->andFilterWhere(['like', 'name_anime_p', $this->name_anime_p])
            ->andFilterWhere(['like', 'poster', $this->poster])
            ->andFilterWhere(['like', 'path_n', $this->path_n])
            ->andFilterWhere(['like', 'source', $this->source]);

        return $dataProvider;
    }
}
