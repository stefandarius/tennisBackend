<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Antrenori;

/**
 * AntrenorSearch represents the model behind the search form of `backend\models\Antrenori`.
 */
class AntrenorSearch extends Antrenori
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'localitate', 'gen', 'judet'], 'integer'],
            [['nume', 'prenume', 'email', 'nume_localitate'], 'safe'],
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
        $query = Antrenori::find()->alias('a');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['nume_localitate'] = [
            'asc' => ['l.nume' => SORT_ASC],
            'desc' => ['l.nume' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['judet'] = [
            'asc' => ['j.nume' => SORT_ASC],
            'desc' => ['j.nume' => SORT_DESC],
        ];

        $query->innerJoin('localitati l', 'l.id=a.localitate');
        $query->innerJoin('judete j', 'j.id=l.judet');
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'localitate' => $this->localitate,
            'gen' => $this->gen,
            'j.id' => $this->judet
        ]);

        $query->andFilterWhere(['like', 'a.nume', $this->nume])
            ->andFilterWhere(['like', 'a.prenume', $this->prenume])
            ->andFilterWhere(['like', 'a.email', $this->email])
            ->andFilterWhere(['like', 'l.nume', $this->nume_localitate]);

        return $dataProvider;
    }
}
