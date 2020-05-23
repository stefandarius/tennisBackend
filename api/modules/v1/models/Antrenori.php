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
use backend\models\Profil as AN;

class Antrenori extends AN {

    //put your code here
//    public $nume;
//    public $prenume;
//    public $data_nastere;
//    public $localitate;
//    public $sex;
//    public $telefon;
//
//    public function rules() {
//        $rules = parent::rules();
//        $rules[] = [['nume', 'prenume', 'data_nastere', 'localitate', 'sex', 'telefon'], 'required'];
//        $rules[] = [['localitate', 'sex'], 'integer'];
//        $rules[] = [['adresa'], 'safe'];
//        return $rules;
//    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->user = \Yii::$app->user->id;
//            $this->localitate=10;
//            var_dump($this);
//            exit();
            //    $this->localitate= intval($this->localitate);
            return true;
        }
        return false;
    }

    public function fields() {
        $fields = parent::fields();
//        $fields['localitate'] = function($model) {
//            return \yii\helpers\ArrayHelper::toArray($model->localitate0, ['backend\models\Localitati' => ['id', 'nume', 'oras']]);
//        };

       
        return $fields;
    }

}
