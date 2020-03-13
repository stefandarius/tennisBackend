<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "abonamente_sportivi".
 *
 * @property int $id
 * @property int $sportiv_id
 * @property int $abonament_id
 * @property string $data_inceput
 *
 * @property Profil $sportiv
 * @property Abonamente $abonament
 * @property IstoricAntrenament[] $istoricAntrenaments
 */
class AbonamenteSportivi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abonamente_sportivi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sportiv_id', 'abonament_id', 'data_inceput'], 'required'],
            [['sportiv_id', 'abonament_id'], 'integer'],
            [['data_inceput'], 'safe'],
            [['sportiv_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profil::className(), 'targetAttribute' => ['sportiv_id' => 'id']],
            [['abonament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Abonamente::className(), 'targetAttribute' => ['abonament_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sportiv_id' => 'Sportiv ID',
            'abonament_id' => 'Abonament ID',
            'data_inceput' => 'Data Inceput',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSportiv()
    {
        return $this->hasOne(Profil::className(), ['id' => 'sportiv_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbonament()
    {
        return $this->hasOne(Abonamente::className(), ['id' => 'abonament_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstoricAntrenaments()
    {
        return $this->hasMany(IstoricAntrenament::className(), ['abonamentSpotiv_id' => 'id']);
    }
}
