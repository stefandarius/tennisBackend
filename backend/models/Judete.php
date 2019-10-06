<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "judete".
 *
 * @property int $id
 * @property string $nume
 *
 * @property Localitati[] $localitatis
 */
class Judete extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judete';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nume'], 'required'],
            [['nume'], 'string', 'max' => 100],
            [['nume'], 'unique'],
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
    public function getLocalitatis()
    {
        return $this->hasMany(Localitati::className(), ['judet' => 'id']);
    }
}
