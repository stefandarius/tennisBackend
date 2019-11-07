<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;

/**
 * Description of Config
 *
 * @author Marian
 */
class Config extends \yii\base\Model{
    //put your code here
    public $niveluri;
    public $stariSanatate;
    public $judete;
    public $tipAntrenament;
    
    public function init() {
        parent::init();
        $this->niveluri= \backend\models\Niveluri::find()->all();
        $this->stariSanatate= \backend\models\StariSanatate::find()->all();
        $this->judete= \backend\models\Judete::find()->all();
        $this->tipAntrenament= \backend\models\TipAntrenament::find()->all();
    }
}
