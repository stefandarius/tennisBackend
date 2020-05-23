<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "profil".
 *
 * @property int $id
 * @property string $nume
 * @property string $prenume
 * @property int $gen
 * @property string $data_nastere
 * @property string $telefon
 * @property int $localitate
 * @property string $adresa
 * @property int $user
 *
 * @property Localitati $localitate0
 * @property User $user0
 */
class Profil extends \yii\db\ActiveRecord {

    public $judet;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'profil';
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->data_nastere = \backend\components\ProjectUtils::getBDDateFormat($this->data_nastere);
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['gen', 'localitate', 'user'], 'integer'],
            [['data_nastere'], 'safe'],
            [['localitate'], 'required'],
            [['nume', 'prenume'], 'string', 'max' => 100],
            [['telefon'], 'string', 'max' => 15],
            [['telefon'], 'unique'],
            [['adresa'], 'string', 'max' => 150],
            [['localitate'], 'exist', 'skipOnError' => true, 'targetClass' => Localitati::className(), 'targetAttribute' => ['localitate' => 'id']],
                //[['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
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
            'gen' => 'Gen',
            'data_nastere' => 'Data Nastere',
            'telefon' => 'Telefon',
            'localitate' => 'Localitate',
            'adresa' => 'Adresa',
            'user' => 'User',
        ];
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
    public function getUser0() {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }

    public function getNumeComplet() {
        return sprintf('%s %s', $this->nume, $this->prenume);
    }

    public function fields() {
        $fields = parent::fields();
        $fields['localitateText'] = function($model) {
            return $model->localitate0->nume;
        };
        //unset($fields['localitate']);
        $fields['judet'] = function($model) {
            return $model->localitate0->judet;
        };
        $fields['data_nastere'] = function($model) {
            return sprintf('%s', \backend\components\ProjectUtils::formatedDate($model->data_nastere));
        };
        \backend\components\ProjectUtils::unsetFields($fields, ['user']);
        return $fields;
    }

}
