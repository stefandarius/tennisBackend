<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;

use backend\models\IstoricAntrenament as IA;

/**
 * Description of IstoricAntrenamente
 *
 * @author stefa
 */
class IstoricAntrenament extends IA {

    public function beforeValidate() {
        if (parent::beforeValidate()) {
            if ($this->isNewRecord) {
                $this->antrenor_id = \Yii::$app->user->identity->profil->id;
            }
            return true;
        }
        return false;
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->data_antrenament= \backend\components\ProjectUtils::getBDDateTimeFormat($this->data_antrenament);
            return true;
        }
        return false;
    }

}
