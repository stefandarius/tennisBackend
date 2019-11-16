<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "antrenori_sportivi".
 *
 * @property int $id
 * @property int $antrenor
 * @property int $sportiv
 *
 * @property Antrenori $antrenor0
 * @property Sportivi $sportiv0
 */
class AntrenorSportiv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'antrenori_sportivi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['antrenor', 'sportiv'], 'integer'],
            [['antrenor', 'sportiv'], 'unique', 'targetAttribute' => ['antrenor', 'sportiv']],
            [['antrenor'], 'exist', 'skipOnError' => true, 'targetClass' => Antrenori::className(), 'targetAttribute' => ['antrenor' => 'id']],
            [['sportiv'], 'exist', 'skipOnError' => true, 'targetClass' => Sportivi::className(), 'targetAttribute' => ['sportiv' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'antrenor' => 'Antrenor',
            'sportiv' => 'Sportiv',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntrenor0()
    {
        return $this->hasOne(Antrenori::className(), ['id' => 'antrenor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSportiv0()
    {
        return $this->hasOne(Sportivi::className(), ['id' => 'sportiv']);
    }
}
