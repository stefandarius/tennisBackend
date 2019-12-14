<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "antrenori".
 *
 * @property int $id
 * @property string $nume
 * @property string $prenume
 * @property int $localitate 
 * @property int $gen 
 * @property int $user
 * @property Localitati $localitate0 
 * @property IstoricAntrenament[] $istoricAntrenaments
 * @property AntrenoriSportivi[] $antrenoriSportivis
 * @property Sportivi[] $sportivs
 * @property User $user0
 * 
 */
class Antrenori extends \yii\db\ActiveRecord {

    public $judet;
    public $nume_localitate;
    public $email;
    public $password;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'antrenori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['nume', 'prenume', 'email', 'gen', 'localitate', 'user'], 'required'],
            [['localitate', 'gen', 'user'], 'integer'],
            [['password','email'],'required','on'=>'create'],
            [['nume', 'prenume', 'email'], 'string', 'max' => 100],
            [['nume', 'prenume'], 'filter', 'filter' => 'ucfirst'],
            //[['email'], 'unique'],
            'judet' => [
                'judet', 'required'
            ]
        ];
    }
    
    public function insert($runValidation = true, $attributes = null) {
        $this->scenario='create';
        return parent::insert($runValidation, $attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nume' => 'Nume',
            'prenume' => 'Prenume',
            'email' => 'Email',
            'gen' => 'Gen',
            'nume_localitate' => 'Localitate'
        ];
    }

    public function getNumeComplet() {
        return sprintf('%s %s', $this->nume, $this->prenume); //$this->nume.' '.$this->prenume;
    }

    public function getAntrenoriSportivis() {
        return $this->hasMany(AntrenoriSportivi::className(), ['antrenor' => 'id']);
    }

    public function getSportivs() {
        return $this->hasMany(Sportivi::className(), ['id' => 'sportiv'])->viaTable('antrenori_sportivi', ['antrenor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitate0() {
        return $this->hasOne(Localitati::className(), ['id' => 'localitate']);
    }
    
      /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0() {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstoricAntrenaments() {
        return $this->hasMany(IstoricAntrenament::className(), ['antrenor_id' => 'id']);
    }

    public function afterFind() {
        parent::afterFind();
        $this->email= is_null($this->user0)?null:$this->user0->email;
    }
    
    public function save($runValidation = true, $attributeNames = null) {
        $newRecord = $this->isNewRecord;
        $transaction = \Yii::$app->db->beginTransaction();
        $user = null;
        $result = true;
        if ($newRecord) {
            $user = new \common\models\User();
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->status = \common\models\User::STATUS_ACTIVE;
            $result = $result && $user->save();
        }
        if (!is_null($user)) {
            if ($result) {
                $this->user = $user->id;
            } else {
                $this->addErrors($user->errors);
            }
        }
        $result = $result && parent::save($runValidation, $attributeNames);
        if ($newRecord && $result) {
            $authAsignment = new AuthAssignment(['item_name' => AuthItem::ROLE_ANTRENOR,
                'user_id' => strval($user->id), 'created_at' => time()]);
            if (!$authAsignment->save()) {
                $this->addErrors($authAsignment->errors);
                $result = false;
            }
        }
        if ($result) {
            $transaction->commit();
        } else {
            $transaction->rollBack();
        }
        return $result;
    }

}
