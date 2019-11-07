<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;
use backend\models\Messages as MS;
/**
 * Description of Messages
 *
 * @author Marian
 */
class Messages extends MS{
    //put your code here
    
    public function fields() {
        $fields=parent::fields(); 
        unset($fields['readed_at']);
        $fields['created_at']=function($model){
            return date('d.m.Y H:i:s',$model->created_at);
        };
        return $fields;
    }
}
