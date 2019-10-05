<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "abonamente".
 *
 * @property int $id
 * @property string $denumire
 * @property int $numar_sedinte
 * @property int $pret
 * @property int $durata
 */
class Abonamente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abonamente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['denumire', 'numar_sedinte', 'pret', 'durata'], 'required'],
            [['numar_sedinte', 'pret', 'durata'], 'integer'],
            [['denumire'], 'string', 'max' => 100],
            [['denumire'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'denumire' => 'Denumire',
            'numar_sedinte' => 'Numar Sedinte',
            'pret' => 'Pret',
            'durata' => 'Durata',
        ];
    }
}
