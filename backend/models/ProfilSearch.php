<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Profil;

/**
 * ProfilSearch represents the model behind the search form of `backend\models\Profil`.
 */
class ProfilSearch extends Profil
{
    
    public $nume_localitate;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gen', 'localitate', 'user'], 'integer'],
            [['nume', 'prenume', 'data_nastere', 'telefon', 'adresa','nume_localitate'], 'safe'],
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
        $query = Profil::find()->alias('p');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->innerJoin('localitati l', 'l.id=p.localitate');
        $query->innerJoin('judete j', 'j.id=l.judet');
        $query->innerJoinWith('user0 u');
        $query->innerJoin('auth_assignment aa','aa.user_id=u.id');
         $dataProvider->sort->attributes['judet'] = [
            'asc' => ['j.nume' => SORT_ASC],
            'desc' => ['j.nume' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['nume_localitate'] = [
            'asc' => ['l.nume' => SORT_ASC],
            'desc' => ['l.nume' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['judet'] = [
            'asc' => ['j.nume' => SORT_ASC],
            'desc' => ['j.nume' => SORT_DESC],
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
            'gen' => $this->gen,
            'data_nastere' => $this->data_nastere,
            'localitate' => $this->localitate,
            'user' => $this->user,
            'localitate' => $this->localitate,
            'j.id' => $this->judet,
            'aa.item_name' => 'antrenor'
        ]);

        $query->andFilterWhere(['like', 'p.nume', $this->nume])
            ->andFilterWhere(['like', 'p.prenume', $this->prenume])
            ->andFilterWhere(['like', 'p.telefon', $this->telefon])
            ->andFilterWhere(['like', 'l.nume', $this->nume_localitate])
            ->andFilterWhere(['like', 'p.adresa', $this->adresa]);
            

        return $dataProvider;
    }
}
