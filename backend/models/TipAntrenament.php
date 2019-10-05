<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tip_antrenament".
 *
 * @property int $id
 * @property string $denumirea
 * @property int $activ
 */
class TipAntrenament extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tip_antrenament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['denumirea'], 'required'],
            [['activ'], 'integer'],
            [['denumirea'], 'string', 'max' => 100],
            [['denumirea'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'denumirea' => 'Denumirea',
            'activ' => 'Activ',
        ];
    }
}
