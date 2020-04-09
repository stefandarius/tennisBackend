<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;

use common\models\User as UR;
use Yii;
use backend\models\AuthAssignment;

/**
 * Users model
 * @property api\modules\v1\models\Profiles $profile
 * 
 */
class Users extends UR {

    public $password;
    public $type;

    public function rules() {
        $rules = parent::rules();
        $rules[] = [['password', 'type', 'email'], 'required'];
        // $rules[] = ['type', 'validateAccountType'];
        $rules[] = ['type', 'in', 'range' => [\backend\models\AuthItem::ROLE_ANTRENOR, \backend\models\AuthItem::ROLE_SPORTIV]];
        return $rules;
    }

    public function validateAccountType($attribute, $params, $validator) {
        if (!\yii\helpers\ArrayHelper::isIn($this->$attribute, ['antrenor', 'sportiv'])) {
            $this->addError($attribute, \Yii::t('app', 'Tipul contului trebuie sa fie antrenor sau sportiv'));
        }
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->setPassword($this->password);
            $this->generateAuthKey();
            $this->status = static::STATUS_ACTIVE;
            return true;
        }
        return false;
    }

    public function fields() {
        $fields = parent::fields();
        unset($fields['password_hash']);
        unset($fields['password_reset_token']);
        unset($fields['status']);
        unset($fields['created_at']);
        unset($fields['updated_at']);
        unset($fields['verification_token']);
        if ($this->getRol()->one()->name === 'antrenor') {
            $fields['sportivi'] = function($model) {

                return Sportivi::find()
                                ->innerJoin('antrenori_sportivi ai', 'ai.sportiv=detalii_sportivi.profil')
                                ->innerJoin('profil p', 'p.id=ai.antrenor')->where(['p.user' => $model->id])->all();
            };
        }
        if ($this->getRol()->one()->name === 'sportiv') {
            $fields['detalii'] = function($model) {
                return Sportivi::find()->alias('ds')
                                ->innerJoin('profil p', 'p.id=ds.profil')->where(['p.user' => $model->id])->one();
            };
        }
        $fields['rol'] = function($model) {
            return $model->getRol()->one()->name;
        };
        return $fields;
    }

    public function login($email, $password) {
        $user = static::findOne(['email' => $email]);
        if (!is_null($user) && Yii::$app->security->validatePassword($password, $user->password_hash) && $user->status === \common\models\User::STATUS_ACTIVE) {
            return $user;
        } else {
            if (!is_null($user) && \common\models\User::STATUS_DELETED === $user->status) {
                $this->addError('email', 'Utilizator sters sau blocat.');
            } else {
                $this->addError('email', 'Credentiale invalide');
            }
            return $this;
        }
    }

    public function save($runValidation = true, $attributeNames = null) {
        $newRecord = $this->isNewRecord;
        $transaction = \Yii::$app->db->beginTransaction();
        $result = true;
        if ($newRecord) {
            $result = $result && parent::save($runValidation, $attributeNames);
        }
        // var_dump($this->type);
        if ($newRecord && $result) {
            $authAsignment = new AuthAssignment(['item_name' => $this->type,
                'user_id' => strval($this->id), 'created_at' => time()]);
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
