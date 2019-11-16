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
use backend\models\Sportivi as SP;

class Sportivi extends SP {

    //put your code here

    public function rules() {
        $rules = parent::rules();
        unset($rules['judet']);
        return $rules;
    }
    
    public function fields() {
        $fields=parent::fields();
        $fields['nivelText']=function($model){
            return $model->nivel0->nume;
        };
        $fields['stareSanatateText']=function($model){
            return $model->stareSanatate->nume;
        };
        $fields['localitate']=function($model){
            return \yii\helpers\ArrayHelper::toArray($model->localitate0, ['backend\models\Localitati' => ['id', 'nume','oras']]);     
        };
        $fields['judet']=function($model){
            return \yii\helpers\ArrayHelper::toArray($model->localitate0->judet0, ['backend\models\Judete' => ['id', 'nume']]);     
        };
        $fields['judetText']=function($model){
            return trim($model->localitate0->judet0->nume);
        };
        $fields['adresa']=function($model){
            return sprintf('%s, %s',trim($model->localitate0->judet0->nume),$model->localitate0->nume);
        };
        $fields['numeComplet']=function($model){
            return sprintf('%s %s',$model->nume,$model->prenume);
        };
        $fields['data_nastere']=function($model) {
            return sprintf('%s', \backend\components\ProjectUtils::formatedDate($model->data_nastere));
        };
        return $fields;
    }

}
