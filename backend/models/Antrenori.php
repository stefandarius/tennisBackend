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
 * 
 * @property Localitati $localitate0 
 * @property IstoricAntrenament[] $istoricAntrenaments
 */
class Antrenori extends \yii\db\ActiveRecord {

    public $judet;
    
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
            [['nume', 'prenume', 'email', 'gen', 'judet', 'localitate'], 'required'],
            [['localitate', 'gen', 'judet'], 'integer'],
            [['nume', 'prenume', 'email'], 'string', 'max' => 100],
            [['email'], 'unique'],
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
            'localitate' => 'Localitate',
            'gen' => 'Gen',
        ];
    }

    public function getNumeComplet() {
        return sprintf('%s %s', $this->nume, $this->prenume); //$this->nume.' '.$this->prenume;
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