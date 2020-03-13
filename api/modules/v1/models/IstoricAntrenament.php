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

    public $sportiv_id;

    public function rules() {
        $rules = parent::rules();
        $rules[] = [['sportiv_id'], 'required'];
        $rules[] = [['sportiv_id'], 'integer'];
        return $rules;
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->antrenor_id = \Yii::$app->user->identity->profil->id;
                $this->created_at = time();
            }
            $ab_sportiv = \Yii::$app->db->createCommand()
                    ->setSql('SELECT  hh.* FROM abonamente_sportivi as hh inner join abonamente as ab on ab.id=hh.abonament_id '
                            . 'WHERE date(hh.data_inceput)<=date(:da) and date(date_add(hh.data_inceput, INTERVAL ab.durata DAY))'
                            . '>=DATE(:da)')->bindValue(':da', $this->data_antrenament)->queryAll()[0];
            if(!is_null($ab_sportiv)) {
                $this->abonamentSpotiv_id = intval($ab_sportiv['id']);
            }
            return true;
        }
        return false;
    }

}
