<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "antrenori".
 *
 * @property int $id
 * @property string $nume
 * @property string $prenume
 * @property string $email
 * @property int $localitate 
 * @property int $gen 
 * @property int $user
 * @property AntrenoriSportivi[] $antrenoriSportivis
 * @property Localitati $localitate0 
 * @property IstoricAntrenament[] $istoricAntrenaments
 * @property AntrenoriSportivi[] $antrenoriSportivis
 * @property Sportivi[] $sportivs
 */
class Antrenori extends \yii\db\ActiveRecord {

    public $judet;
    public $nume_localitate;
    public $password;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'antrenori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['nume', 'prenume', 'email', 'gen', 'localitate', 'password', 'user'], 'required'],
            [['localitate', 'gen', 'user'], 'integer'],
            [['nume', 'prenume', 'email'], 'string', 'max' => 100],
            [['nume', 'prenume'], 'filter', 'filter' => 'ucfirst'],
            [['email'], 'unique'],
            'judet'=>[
                'judet','required'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nume' => 'Nume',
            'prenume' => 'Prenume',
            'email' => 'Email',
            'gen' => 'Gen',
            'nume_localitate' => 'Localitate'
        ];
    }

    public function getNumeComplet() {
        return sprintf('%s %s', $this->nume, $this->prenume); //$this->nume.' '.$this->prenume;
    }

    public function getAntrenoriSportivis() {
        return $this->hasMany(AntrenoriSportivi::className(), ['antrenor' => 'id']);
    }

    public function getSportivs() {
        return $this->hasMany(Sportivi::className(), ['id' => 'sportiv'])->viaTable('antrenori_sportivi', ['antrenor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitate0() {
        return $this->hasOne(Localitati::className(), ['id' => 'localitate']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstoricAntrenaments() {
        return $this->hasMany(IstoricAntrenament::className(), ['antrenor_id' => 'id']);
    }
    
    

}
