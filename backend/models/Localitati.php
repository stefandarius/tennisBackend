<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "localitati".
 *
 * @property int $id
 * @property int $judet
 * @property string $nume
 * @property int $oras
 *
 * @property Judete $judet0
 */
class Localitati extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localitati';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judet', 'nume', 'oras'], 'required'],
            [['judet', 'oras'], 'integer'],
            [['nume'], 'string', 'max' => 120],
            [['judet', 'nume'], 'unique', 'targetAttribute' => ['judet', 'nume']],
            [['judet'], 'exist', 'skipOnError' => true, 'targetClass' => Judete::className(), 'targetAttribute' => ['judet' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judet' => 'Judet',
            'nume' => 'Nume',
            'oras' => 'Oras',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJudet0()
    {
        return $this->hasOne(Judete::className(), ['id' => 'judet']);
    }
}
