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
 */
class Antrenori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'antrenori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nume', 'prenume', 'email'], 'required'],
            [['nume', 'prenume', 'email'], 'string', 'max' => 100],
            [['email'], 'unique'],
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
            'email' => 'Email',
        ];
    }
    
    public function getNumeComplet() {
        return sprintf('%s %s',$this->nume,$this->prenume);//$this->nume.' '.$this->prenume;
    }
}
