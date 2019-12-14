<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detalii_sportivi".
 *
 * @property int $id
 * @property int $user
 * @property int $profil
 * @property int $nivel
 * @property int $greutate
 * @property int $inaltime
 * @property int $stare_sanatate
 *
 * @property User $user0
 * @property Niveluri $nivel0
 * @property StariSanatate $stareSanatate
 * @property Profil $profil0
 */
class DetaliiSportiv extends \yii\db\ActiveRecord
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
            [['user', 'profil', 'nivel', 'greutate', 'inaltime', 'stare_sanatate'], 'integer'],
            [['nivel', 'greutate', 'inaltime', 'stare_sanatate'], 'required'],
            [['profil'], 'unique'],
            //[['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
            [['nivel'], 'exist', 'skipOnError' => true, 'targetClass' => Niveluri::className(), 'targetAttribute' => ['nivel' => 'id']],
            [['stare_sanatate'], 'exist', 'skipOnError' => true, 'targetClass' => StariSanatate::className(), 'targetAttribute' => ['stare_sanatate' => 'id']],
            [['profil'], 'exist', 'skipOnError' => true, 'targetClass' => Profil::className(), 'targetAttribute' => ['profil' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
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
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfil0()
    {
        return $this->hasOne(Profil::className(), ['id' => 'profil']);
    }
}
