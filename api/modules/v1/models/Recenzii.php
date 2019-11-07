<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;
use backend\models\Recenzii as RC;
/**
 * Description of Recenzii
 *
 * @author Marian
 */
class Recenzii extends RC{
    //put your code here
    
       public function save($runValidation = true, $attributeNames = null) {
        $existent = RC::findOne(['client' => \Yii::$app->user->id, 
            'review_party' => $this->review_party,'review_party_type'=> $this->review_party_type]);
           /* @var $existent backend\models\Recenzii */
        
        if (!is_null($existent)) {
            $existent->titlu= $this->titlu;
            $existent->descriere= $this->descriere;
            $existent->rating=  $this->rating;
            $existent->updated_at=time();
            $existent->save();
            $this->id=$existent->id;
            $this->client=$existent->client;
            $this->updated_at=$existent->updated_at;
            $this->viewed_at=$existent->viewed_at;
            return true;
        }
        return parent::save($runValidation, $attributeNames);
    }
}
