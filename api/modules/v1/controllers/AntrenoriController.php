<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\controllers;

/**
 * Description of AntrenoriController
 *
 * @author Marian
 */
class AntrenoriController extends BApiController{
    //put your code here
    protected function initializeModelClass() {
        $this->modelClass= '\api\modules\v1\models\Antrenori';
    }
    
    protected function disableCheckAccessActions() {
        return ['index','create'];
    }

}
