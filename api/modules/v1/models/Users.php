<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;

use common\models\User as UR;
use Yii;
use yii\imagine\Image;

/**
 * Users model
 * @property api\modules\v1\models\Profiles $profile
 * 
 */
class Users extends UR {

    public function login($username, $password) {
        $user = static::findOne(['username' => $username]);
        if (!is_null($user) && Yii::$app->security->validatePassword($password, $user->password_hash) && $user->status === \common\models\User::STATUS_ACTIVE) {
            return $user;
        } else {
            if (!is_null($user) && \common\models\User::STATUS_DELETED === $user->status) {
                $this->addError('username', 'User is blocked or deleted.');
            } else {
                $this->addError('username', 'Invalid credentials');
            }
            return $this;
        }
    }

    public function fields() {
        $fields = parent::fields();
        unset($fields['password_hash']);
        unset($fields['password_reset_token']);
        unset($fields['status']);
        unset($fields['created_at']);
        unset($fields['updated_at']);
        unset($fields['verification_token']);
        return $fields;
    }

}
