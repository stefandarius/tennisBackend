<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detalii_sportivi".
 *
 * @property int $id
 * @property int $profil
 * @property int $nivel
 * @property int $greutate
 * @property int $inaltime
 * @property int $stare_sanatate
 *
 * @property Profil $profil0
 * @property Niveluri $nivel0
 * @property StariSanatate $stareSanatate
 */
class DetaliiSportivi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalii_sportivi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profil', 'nivel', 'greutate', 'inaltime', 'stare_sanatate'], 'integer'],
            [['nivel', 'greutate', 'inaltime', 'stare_sanatate'], 'required'],
            [['profil'], 'exist', 'skipOnError' => true, 'targetClass' => Profil::className(), 'targetAttribute' => ['profil' => 'id']],
            [['nivel'], 'exist', 'skipOnError' => true, 'targetClass' => Niveluri::className(), 'targetAttribute' => ['nivel' => 'id']],
            [['stare_sanatate'], 'exist', 'skipOnError' => true, 'targetClass' => StariSanatate::className(), 'targetAttribute' => ['stare_sanatate' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profil' => 'Profil',
            'nivel' => 'Nivel',
            'greutate' => 'Greutate',
            'inaltime' => 'Inaltime',
            'stare_sanatate' => 'Stare Sanatate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfil0()
    {
        return $this->hasOne(Profil::className(), ['id' => 'profil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivel0()
    {
        return $this->hasOne(Niveluri::className(), ['id' => 'nivel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStareSanatate()
    {
        return $this->hasOne(StariSanatate::className(), ['id' => 'stare_sanatate']);
    }
}
