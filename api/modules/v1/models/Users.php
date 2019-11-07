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

    //put your code here
    public $validation_token;
    public $phone;
    public $password;
    public $password_repeat;
    public $name;
    public $avatar_url;
    public $account_type;
    public $tip;
    public $descriere_romana;
    public $descriere_engleza;
    public $_profile;
    public $_pt_profile;
    public $imageFiles;
    public $link_youtube;
    public $data_nastere;
    public $gen;
    public $servicii;

    public function rules() {
        $rules = parent::rules();
        $rules[] = [['validation_token', 'email', 'name', 'account_type', 'tip', 'avatar_url'], 'required'];
        $rules[] = ['validation_token', 'validateToken'];
        $rules[] = ['avatar_url', 'url'];
        $rules[] = ['gen', 'integer'];
        $rules[] = ['account_type', 'validateAccountType'];
        $rules[] = ['tip', 'validateTip'];
        $rules[] = ['link_youtube', 'url', 'on' => \backend\models\AuthItem::ROLE_PERSONAL_TRAINER];
        $rules[] = ['data_nastere', 'required', 'on' => \backend\models\AuthItem::ROLE_PERSONAL_TRAINER];
        $rules[] = ['descriere_romana', 'required', 'on' => \backend\models\AuthItem::ROLE_PERSONAL_TRAINER];
        $rules[] = ['servicii', 'required', 'on' => \backend\models\AuthItem::ROLE_PERSONAL_TRAINER];

// $rules[] = ['documente_scanate', 'image'/*, 'skipOnEmpty' => true*/];
        $rules[] = [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4, 'on' => \backend\models\AuthItem::ROLE_PERSONAL_TRAINER];
//      [['password_repeat'], 'required', 'on' => 'signup_ui'],
        //[['password_repeat'], 'compare', 'compareAttribute' => 'password', 'on' => 'signup_ui'],
        $rules[] = [['email'], 'unique'];
        $rules[] = [['password', 'password_repeat'], 'required'];
        $rules[] = ['password', 'string', 'min' => 6];

        $rules[] = ['password_repeat', 'compare', 'compareAttribute' => 'password'];
        $rules[] = [['descriere_romana', 'descriere_engleza'], 'string', 'max' => 250, 'on' => \backend\models\AuthItem::ROLE_PERSONAL_TRAINER];
        $rules[] = [['descriere_romana', 'descriere_engleza'], 'filter', 'filter' => 'ucfirst', 'on' => \backend\models\AuthItem::ROLE_PERSONAL_TRAINER];
        $rules[] = [['auth_key', 'phone', 'data_nastere', 'gen'], 'safe'];
        return $rules;
    }

    public function validateToken($attribute, $params, $validator) {
        $tokenChecker = new \common\components\FbTokenChecker($this->$attribute);
        if ($this->account_type === 'google') {
            $tokenChecker = new \common\components\GoogleTokenChecker($this->$attribute);
        }

        $data = $tokenChecker->getUrlStats();
        if (!isset($data->email) || (isset($data->email) && $data->email !== $this->email)) {
            $this->addError($attribute, Yii::t('app', 'Token de validare invalid'));
        }
    }

    public function validateAccountType($attribute, $params, $validator) {
        if (!\yii\helpers\ArrayHelper::isIn($this->$attribute, ['facebook', 'google'])) {
            $this->addError($attribute, \Yii::t('app', 'Tipul contului trebuie sa fie facebook sau google'));
        }
    }

    public function validateTip($attribute, $params, $validator) {
        if (!\yii\helpers\ArrayHelper::isIn($this->$attribute, [\backend\models\AuthItem::ROLE_CLIENT, \backend\models\AuthItem::ROLE_PERSONAL_TRAINER])) {
            $this->addError($attribute, \Yii::t('app', 'Tipul trebuie sa fie {client} sau {pt}', ['client' => \backend\models\AuthItem::ROLE_CLIENT,
                        'pt' => \backend\models\AuthItem::ROLE_PERSONAL_TRAINER]));
        }
    }

    public function associateDevice($id = NULL) {
        $device_uuid = \Yii::$app->request->getHeaders()->get('device-uuid');
        $sql = 'SELECT du.id AS duid,dev.id AS deviceid FROM devices dev '
                . 'LEFT JOIN devices_users du ON du.device=dev.id AND du.user=:uid '
                . 'WHERE dev.uuid=:duid';
        //  var_dump(Yii::$app->db->createCommand($sql)->bindValues([':uid' => is_null($id)?$this->id:$id, ':duid' => $device_uuid])->rawSql);
        $datas = Yii::$app->db->createCommand($sql)->bindValues([':uid' => is_null($id) ? $this->id : $id, ':duid' => $device_uuid])->queryOne();
        if (is_null($datas['duid'])) {
            $deviceUsers = new \backend\models\DevicesUsers();
            $deviceUsers->user = is_null($id) ? $this->id : $id;
            $deviceUsers->device = intval($datas['deviceid']);
            return $deviceUsers->save(false);
        } else {
            \backend\models\DevicesUsers::updateAll(['receive_push' => 1], ['device' => $datas['deviceid'], 'user' => is_null($id) ? $this->id : $id]);
            return true;
        }
        return false;
    }

//    public function beforeValidate() {
//        //$this->checkProfile();
//        //$this->addErrors($this->_profile->errors);
//        return parent::beforeValidate();
//    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                if ($this->scenario === \backend\models\AuthItem::ROLE_PERSONAL_TRAINER) {
                    $this->status = 5;
                } else {
                    $this->status = 10;
                }
                $this->setPassword($this->password);
            }
            $this->auth_key = Yii::$app->security->generateRandomString();
            if (!\backend\components\ProjectUtils::substr_startswith($this->phone, "+")) {
                $this->phone = sprintf("+4%s", $this->phone);
            }
            return true;
        }
        return false;
    }

    public function fields() {
        $fields = parent::fields();
        $fields['profile'] = function($model) {
            return $model->_profile;
        };
        unset($fields['password_hash']);
        unset($fields['password']);
        unset($fields['password_reset_token']);
        unset($fields['activated_at']);
        unset($fields['auth_key']);
        if (in_array($this->scenario, [\backend\models\AuthItem::ROLE_CLIENT, \backend\models\AuthItem::ROLE_PERSONAL_TRAINER])) {
            $fields['auth_key'] = function($model) {
                return $model->auth_key;
            };
        }
        return $fields;
    }

    public function afterFind() {
        parent::afterFind();
        $this->_profile = $this->profil;
        if (!is_null($this->_profile) && !is_null($this->_profile->personalTrainerProfil)) {
            $this->_pt_profile = $this->profil->personalTrainerProfil;
        }
    }

    private function associateProfile($insert = true) {
        $data = \backend\components\ProjectUtils::split_name($this->name);
        if ($insert) {
            $this->_profile = new \backend\models\Profile(['nume' => $data[0],
                'prenume' => $data[1], 'telefon' => $this->phone, 'user' => $this->id,
                'data_nastere' => $this->data_nastere, 'gen' => $this->gen]);
        } else {
            $this->_profile->nume = $data[0];
            $this->_profile->prenume = $data[1];
            $this->_profile->telefon = $this->phone;
            $this->_profile->data_nastere = $this->data_nastere;
            $this->_profile->gen = $this->gen;
        }
        $this->_profile->validate();
        $this->addErrors($this->_profile->errors);
        return $this->_profile->save();
    }

    private function associateRole($insert) {
        if ($insert) {
            $authAssignment = new \backend\models\AuthAssignment();
            $authAssignment->item_name = $this->tip;
            $authAssignment->user_id = strval($this->id);
            $authAssignment->created_at = time();
            return $authAssignment->save(false);
        }
        return true;
    }

    public function saveUser($insert) {

        $transaction = \Yii::$app->db->beginTransaction();

        $allSaved = $this->save() && $this->associateProfile($insert) && $this->saveProfilPersonalTrainer($insert) && $this->associateDevice() && $this->associateRole($insert) && $this->savePictures($insert);
        if ($allSaved) {
            $transaction->commit();
            return true;
        }
        $transaction->rollBack();
        return false;
    }

    private function saveProfilPersonalTrainer($insert) {
        if ($this->scenario !== \backend\models\AuthItem::ROLE_PERSONAL_TRAINER) {
            return true;
        }
        if ($insert) {
            $this->_pt_profile = new \backend\models\PersonalTrainerProfil(
                    ['profil' => $this->_profile->id, 'descriere_romana' => $this->descriere_romana,
                'descriere_engleza' => $this->descriere_engleza, 'link_youtube' => $this->link_youtube,'servicii'=> $this->servicii]);
        } else {
            $this->_pt_profile->attributes = $this->attributes;
        }
        return $this->_pt_profile->saveWithServicii();//save();
    }

    public function login($username, $password) {
        $user = static::findOne(['username' => $username]);
        if (!is_null($user) && Yii::$app->security->validatePassword($password, $user->password_hash) && $user->status === \common\models\User::STATUS_ACTIVE) {
            //$user->setScenario('login');
            $this->associateDevice($user->id);
            Yii::$app->session['uid'] = $user->id;
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

//    private function createUpdatePhoto($insert) {
//        $photo = new Photos();
//        if (!$insert) {
//            $photo = $this->photo0;
//            if (is_null($photo)) {
//                $photo = new Photos();
//            }
//        }
//        return $photo;
//    }

    private function savePictures($insert) {
        $images = \yii\web\UploadedFile::getInstancesByName('imageFiles');
        //var_dump($images);
        //exit();
        if (isset($images)) {

            foreach ($images as $index => $image) {
                $photo = new \backend\models\Photos(); //$this->createUpdatePhoto($insert);
                $photo->order = $index;
                $photo->party = $this->_pt_profile->party;
                $point = strrpos($image->name, '.');
                $extension = substr($image->name, $point);
                $fileName = \Yii::$app->security->generateRandomString();
                $fileDescription = sprintf('%s%s', $fileName, $extension);
                $photo->photo_path = $fileDescription;
                $photo->photo_description = $image->name;
                $photo_path = sprintf(\Yii::getAlias('@backend') . '/uploads/documente/%s', $fileDescription);
                $photo_path_thumb = sprintf(\Yii::getAlias('@backend') . '/uploads/thumbs/%s', $fileDescription);
                if ($image->saveAs($photo_path)) {
                    Image::thumbnail($photo_path, 1024, 1024)->save($photo_path, ['quality' => 90]);
                    Image::thumbnail($photo_path, 160, 160)->save($photo_path_thumb, ['quality' => 90]);
                    $photo->save();
                }
            }
        }
        return true;
    }

}
