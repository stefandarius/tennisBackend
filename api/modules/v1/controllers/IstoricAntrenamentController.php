<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\controllers;

/**
 * Description of IstoricAntrenamentController
 *
 * @author stefa
 */
class IstoricAntrenamentController extends BApiController{
    
    protected function initializeModelClass() {
        $this->modelClass= '\api\modules\v1\models\IstoricAntrenament';
    }

}
