<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nivel".
 *
 * @property int $id
 * @property string $nume
 */
class Nivel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nivel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nume'], 'required'],
            [['nume'], 'string', 'max' => 20],
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
}
