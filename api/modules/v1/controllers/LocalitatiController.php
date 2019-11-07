<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\controllers;

/**
 * Description of LocalitatiController
 *
 * @author Marian
 */
class LocalitatiController extends BApiController{
    //put your code here
    protected function initializeModelClass() {
        $this->modelClass='backend\models\Localitati';
    }
    
    protected function disableCheckAccessActions() {
        return ['index'];
    }

}
