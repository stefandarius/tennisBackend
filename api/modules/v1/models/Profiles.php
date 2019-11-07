<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;

use backend\models\Profiles as PF;

/**
 * Description of Profiles
 *
 * @author Marian
 */
class Profiles extends PF {
    
//put your code here

    public function rules() {
        $rules = parent::rules();
        //$rules[] = ['phone', 'unique'];
        $rules[]=['phone','safe'];
        return $rules;
    }
}
