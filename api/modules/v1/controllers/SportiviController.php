<?php

namespace api\modules\v1\controllers;

class SportiviController extends BApiController{
    //put your code here
    protected function initializeModelClass() {
        $this->modelClass= '\api\modules\v1\models\Sportivi';
    }
    
    protected function disableCheckAccessActions() {
        return ['index', 'update'];
    }

}
