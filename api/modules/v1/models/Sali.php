<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;

/**
 * Description of Sali
 *
 * @author Marian
 */
class Sali extends \backend\models\Institutii{
    //put your code here
    
    public function fields() {
        $fields=parent::fields();
        // $data = \yii\helpers\ArrayHelper::toArray($model->from0, ['api\modules\v1\models\Users' => ['id', 'email', 'created_at', 'role']]);
            //$data['profile'] = \yii\helpers\ArrayHelper::toArray($model->from0->profile, ['backend\models\Profiles' => ['name', 'avatar_url']]);
            
        $fields['antrenori']=function($model){
            return $model->antrenori;
        };
        $fields['tip_vestiar']=function($model){
            return $model->tip_vestiar==1?"Vestiare separate":"Vestiar comun";
        };
        $fields['servicii']=function($model){
            return $model->getServiciis()->all();
        };
         $fields['tip_baie']=function($model){
            return $model->tip_baie==1?"Bai separate":"Baie comuna";
        };
        $fields['clase']=function($model){
            return $model->clases;
        };
//        $fields['denumire_oras']=function($model){
//          return  $model->getDenumireOras();  
//        };
        
        return $fields;
    }
}
