<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;

use backend\models\RezervariClienti as RC;

/**
 * Description of Rezervari
 *
 * @author Marian
 */
class Rezervari extends RC {

    public function rules() {
        $rules = parent::rules();
        $rules[] = ['zi', 'validateZi'];
        return $rules;
    }

    public function validateZi($attribute, $params, $validator) {
        $datas= PTDisponibilitate::find()->alias('ptd')
              ->innerJoin('personal_trainer_servicii pts','pts.personal_trainer=ptd.personal_trainer')
            ->where(['pts.id'=> $this->personal_trainer_serviciu])->all();
        $zile= \yii\helpers\ArrayHelper::getColumn($datas, 'zi_saptamana');
        if (!in_array($this->zi, $zile)) {
            $this->addError($attribute, \Yii::t('app', 'Nu puteti face o rezervare in aceasta zi'));
        }
    }

    //put your code here
}
