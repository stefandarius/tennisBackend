<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;

/**
 * Description of Sportivi
 *
 * @author Marian
 */
use backend\models\DetaliiSportivi as SP;

class Sportivi extends SP {

    public $nume;
    public $prenume;
    public $data_nastere;
    public $localitate;
    public $sex;
    public $telefon;

    //put your code here
    public $nume;
    public $prenume;
    public $data_nastere;
    public $localitate;
    public $sex;
    public $numar_telefon;

    public function rules() {
        $rules = parent::rules();
        $rules[] = [['nume', 'prenume', 'data_nastere', 'localitate', 'sex','telefon'], 'required'];
        $rules[] = [['localitate', 'sex'], 'integer'];
        $rules[] = [['adresa'], 'safe'];
        return $rules;
    }

//    public function safeAttributes() {
//        return array_merge(['nume','prenume','data_nastere','localitate','sex'],parent::safeAttributes());
//    }

    public function save($runValidation = true, $attributeNames = null) {
        $newRecord = $this->isNewRecord;
        $transaction = \Yii::$app->db->beginTransaction();
        $result = true;
        $profil = new \backend\models\Profil();
        if(!$newRecord){
            $profil= $this->profil0;  
        }
        else{
            $profil->user= \Yii::$app->user->id;
        }
        $profil->attributes = \backend\components\ProjectUtils::getPublicAttributesAndValues($this, \yii\base\Model::attributes());
        
        if ($profil->save()) {
            $result = true;
        } else {
            $result = false;
            $this->addErrors($profil->errors);
        }
        if($newRecord && $result){
            $this->profil=$profil->id;
        }
        $result = $result && parent::save($runValidation, $attributeNames);
        if ($result) {
            $transaction->commit();
        } else {
            $transaction->rollBack();
        }
        return $result;
    }

    public function fields() {
        $fields = parent::fields();
        $fields['nivelText'] = function($model) {
            return $model->nivel0->nume;
        };
        $fields['profil']=function($model){
            return \yii\helpers\ArrayHelper::toArray($model->profil0, ['backend\models\Profil' => []]);     
        };
        $fields['stareSanatateText'] = function($model) {
            return $model->stareSanatate->nume;
        };
        return $fields;
    }
    
    public function save($runValidation = true, $attributeNames = null) {
        $newRecord = $this->isNewRecord;
        $transaction = \Yii::$app->db->beginTransaction();
        $result = true;
        if ($newRecord) {
            $result = $result && parent::save($runValidation, $attributeNames);
        }
        if ($newRecord && $result) {
            $profil = new \backend\models\Profil(['nume' => $this->nume, 'prenume' => $this->prenume,
                'gen' => $this->sex, 'localitate' => $this->localitate, 
                'data_nastere' => $this->data_nastere, 'numar_telefon' => $this->numar_telefon]);
            if (!$profil->save()) {
                $this->addError($profil->errors);
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
