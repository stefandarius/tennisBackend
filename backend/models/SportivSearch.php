<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sportivi;

/**
 * SportivSearch represents the model behind the search form of `backend\models\Sportivi`.
 */
class SportivSearch extends Sportivi {
    
    public $nume_localitate;
    
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'sex', 'nivel', 'greutate', 'inaltime', 'stare_sanatate', 'localitate', 'judet'], 'integer'],
            [['nume', 'prenume', 'data_nastere', 'email', 'numar_telefon', 'nume_localitate'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Sportivi::find()->alias('s');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->innerJoin('localitati l', 'l.id=s.localitate');
        $query->innerJoin('judete j', 'j.id=l.judet');
         $dataProvider->sort->attributes['judet'] = [
            'asc' => ['j.nume' => SORT_ASC],
            'desc' => ['j.nume' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['nume_localitate'] = [
            'asc' => ['l.nume' => SORT_ASC],
            'desc' => ['l.nume' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'data_nastere' => $this->data_nastere,
            'sex' => $this->sex,
            'nivel' => $this->nivel,
            'greutate' => $this->greutate,
            'inaltime' => $this->inaltime,
            'stare_sanatate' => $this->stare_sanatate,
            'localitate' => $this->localitate,
            'j.id' => $this->judet
        ]);

        $query->andFilterWhere(['like', 's.nume', $this->nume])
            ->andFilterWhere(['like', 's.prenume', $this->prenume])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like','l.nume',$this->nume_localitate])
            ->andFilterWhere(['like', 'numar_telefon', $this->numar_telefon]);

        return $dataProvider;
    }

}
