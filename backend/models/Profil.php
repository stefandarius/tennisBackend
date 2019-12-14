<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profil".
 *
 * @property int $id
 * @property string $nume
 * @property string $prenume
 * @property int $gen
 * @property string $numar_telefon
 * @property int $localitate
 * @property string $data_nastere
 */
class Profil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gen', 'localitate'], 'integer'],
            [['data_nastere'], 'safe'],
            [['nume', 'prenume'], 'string', 'max' => 100],
            [['numar_telefon'], 'string', 'max' => 20],
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
            'gen' => 'Gen',
            'numar_telefon' => 'Numar Telefon',
            'localitate' => 'Localitate',
            'data_nastere' => 'Data Nastere',
        ];
    }
}
