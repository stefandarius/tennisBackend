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
 *
 * @property Antrenori $antrenor
 * @property AbonamenteSportivi $abonamentSpotiv
 * @property TipAntrenament $tipAntrenament
 */
class IstoricAntrenament extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'istoric_antrenament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['antrenor_id', 'abonamentSpotiv_id', 'tipAntrenament_id', 'grad_dificultate', 'rating', 'data_antrenament'], 'required'],
            [['antrenor_id', 'abonamentSpotiv_id', 'tipAntrenament_id', 'grad_dificultate', 'rating'], 'integer'],
            [['data_antrenament'], 'safe'],
            [['antrenor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Antrenori::className(), 'targetAttribute' => ['antrenor_id' => 'id']],
            [['abonamentSpotiv_id'], 'exist', 'skipOnError' => true, 'targetClass' => AbonamenteSportivi::className(), 'targetAttribute' => ['abonamentSpotiv_id' => 'id']],
            [['tipAntrenament_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipAntrenament::className(), 'targetAttribute' => ['tipAntrenament_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'antrenor_id' => 'Antrenor ID',
            'abonamentSpotiv_id' => 'Abonament Spotiv ID',
            'tipAntrenament_id' => 'Tip Antrenament ID',
            'grad_dificultate' => 'Grad Dificultate',
            'rating' => 'Rating',
            'data_antrenament' => 'Data Antrenament',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntrenor()
    {
        return $this->hasOne(Antrenori::className(), ['id' => 'antrenor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbonamentSpotiv()
    {
        return $this->hasOne(AbonamenteSportivi::className(), ['id' => 'abonamentSpotiv_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipAntrenament()
    {
        return $this->hasOne(TipAntrenament::className(), ['id' => 'tipAntrenament_id']);
    }
}
