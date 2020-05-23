<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\controllers;

use api\modules\v1\models\Sportivi;

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
    
//    protected function disableCheckAccessActions() {
//        return ['index','create'];
//    }
    
    public function actionListaSportivi() {
        return Sportivi::find()
                    ->innerJoin('antrenori_sportivi ai','ai.sportiv=detalii_sportivi.profil')
                    ->innerJoin('profil p','p.id=ai.antrenor')->where(['p.user'=> \Yii::$app->user->id])->all();
    }

}
