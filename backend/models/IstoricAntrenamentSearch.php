<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IstoricAntrenament;

/**
 * IstoricAntrenamentSearch represents the model behind the search form of `backend\models\IstoricAntrenament`.
 */
class IstoricAntrenamentSearch extends IstoricAntrenament
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'antrenor_id', 'sportiv_id', 'tipAntrenament_id', 'grad_dificultate', 'rating'], 'integer'],
            [['data_antrenament'], 'safe'],
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
        $query = IstoricAntrenament::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['data_antrenament' => SORT_DESC]]
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
            'antrenor_id' => $this->antrenor_id,
            'sportiv_id' => $this->sportiv_id,
            'tipAntrenament_id' => $this->tipAntrenament_id,
            'grad_dificultate' => $this->grad_dificultate,
            'rating' => $this->rating,
            'data_antrenament' => $this->data_antrenament,
        ]);

        return $dataProvider;
    }
}
