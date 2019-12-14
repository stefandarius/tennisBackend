<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetaliiSportivi;

/**
 * DetaliiSportiviSearch represents the model behind the search form of `backend\models\DetaliiSportivi`.
 */
class DetaliiSportiviSearch extends DetaliiSportivi {

    public $gen;
    public $data_nastere;
    public $nume, $prenume, $localitate_nume, $telefon, $judet;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'profil', 'judet', 'gen', 'nivel', 'greutate', 'inaltime', 'stare_sanatate'], 'integer'],
            [['data_nastere', 'nume', 'prenume', 'telefon', 'localitate_nume'], 'safe']
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
        $query = DetaliiSportivi::find()->alias('ds');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->innerJoin('profil p', 'p.id=ds.profil');

        $query->innerJoin('localitati l', 'l.id=p.localitate');
        $query->innerJoin('judete j', 'j.id=l.judet');
        $query->innerJoin('user u', 'p.user=u.id');
        $query->innerJoin('auth_assignment aa', 'aa.user_id=u.id');

        $dataProvider->sort->attributes['nume'] = [
            'asc' => ['p.nume' => SORT_ASC],
            'desc' => ['p.nume' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['prenume'] = [
            'asc' => ['p.prenume' => SORT_ASC],
            'desc' => ['p.prenume' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['judet'] = [
            'asc' => ['l.judet' => SORT_ASC],
            'desc' => ['l.judet' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['telefon'] = [
            'asc' => ['p.telefon' => SORT_ASC],
            'desc' => ['p.telefon' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['data_nastere'] = [
            'asc' => ['p.data_nastere' => SORT_ASC],
            'desc' => ['p.data_nastere' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['gen'] = [
            'asc' => ['p.gen' => SORT_ASC],
            'desc' => ['p.gen' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['localitate_nume'] = [
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
            'p.gen' => $this->gen,
            'nivel' => $this->nivel,
            'greutate' => $this->greutate,
            'inaltime' => $this->inaltime,
            'stare_sanatate' => $this->stare_sanatate,
            'l.judet' => $this->judet,
            'aa.item_name' => 'sportiv'
        ]);
        $query->andFilterWhere(['LIKE', 'p.nume', $this->nume])
                ->andFilterWhere(['LIKE', 'p.prenume', $this->prenume])
                ->andFilterWhere(['LIKE', 'p.telefon', $this->telefon])
                ->andFilterWhere(['LIKE', 'l.nume', $this->localitate_nume]);

        return $dataProvider;
    }

}
