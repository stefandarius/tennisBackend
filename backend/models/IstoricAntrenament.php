<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "istoric_antrenament".
 *
 * @property int $id
 * @property int $antrenor_id
 * @property int $abonamentSpotiv_id
 * @property int $tipAntrenament_id
 * @property int $grad_dificultate
 * @property int $rating
 * @property string $data_antrenament
 * @property string $descriere
 * @property int $created_at
 *
 * @property AbonamenteSportivi $abonamentSpotiv
 * @property TipAntrenament $tipAntrenament
 * @property Profil $antrenor
 */
class IstoricAntrenament extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'istoric_antrenament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tipAntrenament_id', 'data_antrenament'], 'required'],
            [['antrenor_id', 'abonamentSpotiv_id', 'tipAntrenament_id', 'grad_dificultate', 'rating', 'created_at'], 'integer'],
            [['data_antrenament', 'grad_dificultate', 'rating'], 'safe'],
            [['descriere'], 'string', 'max' => 500],
            //[['abonamentSpotiv_id'], 'exist', 'skipOnError' => true, 'targetClass' => AbonamenteSportivi::className(), 'targetAttribute' => ['abonamentSpotiv_id' => 'id']],
            [['tipAntrenament_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipAntrenament::className(), 'targetAttribute' => ['tipAntrenament_id' => 'id']],
            [['antrenor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profil::className(), 'targetAttribute' => ['antrenor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'antrenor_id' => 'Antrenor ID',
            'abonamentSpotiv_id' => 'Abonament Spotiv ID',
            'tipAntrenament_id' => 'Tip Antrenament ID',
            'grad_dificultate' => 'Grad Dificultate',
            'rating' => 'Rating',
            'data_antrenament' => 'Data Antrenament',
            'descriere' => 'Descriere',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbonamentSpotiv() {
        return $this->hasOne(AbonamenteSportivi::className(), ['id' => 'abonamentSpotiv_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipAntrenament() {
        return $this->hasOne(TipAntrenament::className(), ['id' => 'tipAntrenament_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntrenor() {
        return $this->hasOne(Profil::className(), ['id' => 'antrenor_id']);
    }

}
