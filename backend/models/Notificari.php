<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notificari".
 *
 * @property int $id
 * @property int $tip
 * @property int $actiune
 * @property string $continut
 * @property int $data_primire
 * @property int $data_citire
 * @property int $data_stergere
 */
class Notificari extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notificari';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip', 'actiune', 'continut', 'data_primire', 'data_citire', 'data_stergere'], 'required'],
            [['tip', 'actiune', 'data_primire', 'data_citire', 'data_stergere'], 'integer'],
            [['continut'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tip' => 'Tip',
            'actiune' => 'Actiune',
            'continut' => 'Continut',
            'data_primire' => 'Data Primire',
            'data_citire' => 'Data Citire',
            'data_stergere' => 'Data Stergere',
        ];
    }
}
