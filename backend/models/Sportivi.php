<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sportivi".
 *
 * @property int $id
 * @property string $nume
 * @property string $prenume
 * @property string $data_nastere
 * @property int $sex
 * @property int $nivel
 * @property string $email
 * @property int $greutate
 * @property int $inaltime
 * @property int $stare_sanatate
 * @property string $numar_telefon
 */
class Sportivi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sportivi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nume', 'prenume', 'data_nastere', 'nivel', 'email', 'greutate', 'inaltime', 'stare_sanatate', 'numar_telefon'], 'required'],
            [['data_nastere'], 'safe'],
            [['sex', 'nivel', 'greutate', 'inaltime', 'stare_sanatate'], 'integer'],
            [['nume', 'prenume', 'email'], 'string', 'max' => 100],
            [['numar_telefon'], 'string', 'max' => 15],
            [['email'], 'unique'],
            [['numar_telefon'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nume' => 'Nume',
            'prenume' => 'Prenume',
            'data_nastere' => 'Data Nastere',
            'sex' => 'Sex',
            'nivel' => 'Nivel',
            'email' => 'Email',
            'greutate' => 'Greutate',
            'inaltime' => 'Inaltime',
            'stare_sanatate' => 'Stare Sanatate',
            'numar_telefon' => 'Numar Telefon',
        ];
    }
    
    public function getNumeComplet() {
        return sprintf('%s %s', $this->nume, $this->prenume);
    }
}
