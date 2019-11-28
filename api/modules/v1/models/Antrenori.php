<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;

/**
 * Description of Antrenori
 *
 * @author Marian
 */
use backend\models\Antrenori as AN;
class Antrenori extends AN {
    //put your code here
    
    public function rules() {
        $rules=parent::rules();
        unset($rules['judet']);
        return $rules;
    }
    
    public function fields() {
        $fields=parent::fields();
        $fields['localitate']=function($model){
            return \yii\helpers\ArrayHelper::toArray($model->localitate0, ['backend\models\Localitati' => ['id', 'nume','oras']]);     
        };
        return $fields;
    }
    
    public function save($runValidation = true, $attributeNames = null) {
        $newRecord = $this->isNewRecord;
        $transaction= \Yii::$app->db->beginTransaction();
        $user = new \common\models\User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = \common\models\User::STATUS_ACTIVE;
        $result = $user->save();
        if($result){
            $this->user = $user->id;
        }
        else{
            $this->addError($user->errors);
        }
        $result = $result && parent::save($runValidation, $attributeNames);
        if ($newRecord && $result) {
            $authAssignment = new \backend\models\AuthAssignment(
                    ['item_name' => \backend\models\AuthItem::ROL_ANTRENOR,
                'user_id' => strval($user->id), 'created_at' => time()]);
            if(!$authAssignment->save()) {
           // $authAssignment->validate();
                $this->addError($authAssignment->errors);
                $result = false;
            }
        }
        if($result){
            $transaction->commit();
        }
        else{
            $transaction->rollBack();
        }
        return $result;
    }
}
