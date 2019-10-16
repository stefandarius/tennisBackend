<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stari_sanatate".
 *
 * @property int $id
 * @property string $nume
 *
 * @property Sportivi[] $sportivis
 */
class StariSanatate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stari_sanatate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nume'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSportivis()
    {
        return $this->hasMany(Sportivi::className(), ['stare_sanatate' => 'id']);
    }
}
