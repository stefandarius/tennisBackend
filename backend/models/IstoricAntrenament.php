<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "istoric_antrenament".
 *
 * @property int $id
 * @property int $antrenor_id
 * @property int $sportiv_id
 * @property int $tipAntrenament_id
 * @property int $grad_dificultate
 * @property int $rating
 * @property string $data_antrenament
 *
 * @property Profil $antrenor
 * @property Profil $sportiv
 * @property TipAntrenament $tipAntrenament
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
            [['antrenor_id', 'sportiv_id', 'tipAntrenament_id', 'grad_dificultate', 'data_antrenament'], 'required'],
            [['antrenor_id', 'sportiv_id', 'tipAntrenament_id', 'grad_dificultate', 'rating'], 'integer'],
            ['sportiv_id', 'validateSportiv'],
            [['data_antrenament'], 'safe'],
            [['data_antrenament'], 'datetime', 'format' => 'php:d.m.Y H:i:s'],
            [['antrenor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profil::className(), 'targetAttribute' => ['antrenor_id' => 'id']],
            [['sportiv_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profil::className(), 'targetAttribute' => ['sportiv_id' => 'id']],
            [['tipAntrenament_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipAntrenament::className(), 'targetAttribute' => ['tipAntrenament_id' => 'id']],
        ];
    }

    public function validateSportiv($attribute, $params, $validator) {
        if (is_null(\backend\models\AntrenoriSportivi::findOne(['antrenor' => \Yii::$app->user->identity->profil->id,
                            'sportiv' => $this->$attribute]))) {
            $validator->addError($this, $attribute, 'Acest sportiv nu este asociat acestui antrenor');
            return false;
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'antrenor_id' => 'Antrenor ID',
            'sportiv_id' => 'Sportiv ID',
            'tipAntrenament_id' => 'Tip Antrenament ID',
            'grad_dificultate' => 'Grad Dificultate',
            'rating' => 'Rating',
            'data_antrenament' => 'Data Antrenament',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntrenor() {
        return $this->hasOne(Profil::className(), ['id' => 'antrenor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSportiv() {
        return $this->hasOne(Profil::className(), ['id' => 'sportiv_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipAntrenament() {
        return $this->hasOne(TipAntrenament::className(), ['id' => 'tipAntrenament_id']);
    }

}
