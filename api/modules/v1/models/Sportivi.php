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
use backend\models\DetaliiSportiv as DP;

class Sportivi extends DP {

    //put your code here
    public $nume;
    public $prenume;
    public $data_nastere;
    public $localitate;
    public $sex;
    public $numar_telefon;

    public function rules() {
        $rules = parent::rules();
        unset($rules['judet']);
        $rules[] = [['nume', 'prenume', 'data_nastere', 'localitate', 'sex', 'numar_telefon'], 'required'];
        $rules[] = [['localitate', 'sex'], 'integer'];
        return $rules;
    }
    
    public function fields() {
        $fields=parent::fields();
        unset($fields['nivel']);
        unset($fields['stare_sanatate']);
        $fields['nivelText']=function($model){
            return $model->nivel0->nume;
        };
        $fields['stareSanatateText']=function($model){
            return $model->stareSanatate->nume;
        };
        $fields['numeComplet']=function($model){
            return sprintf('%s %s',$model->nume,$model->prenume);
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
