<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;

/**
 * Description of Antrenori
 *
 * @author Marian
 */
use backend\models\Antrenori as AN;
class Antrenori extends AN {
    //put your code here
    
    public function rules() {
        $rules=parent::rules();
        unset($rules['judet']);
        return $rules;
    }
}
