<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace api\modules\v1\models;
use backend\models\Devices as DV;
/**
 * Description of Devices
 *
 * @author Marian
 */
class Devices extends DV{
    //put your code here
    
    public function fields() {
        $fields=parent::fields();
        
        unset($fields['device_type']);
        unset($fields['device_os']);
        unset($fields['os_system_name']);
        unset($fields['device_version']);
        unset($fields['device_manufactured']);
        unset($fields['device_display']);
        unset($fields['device_time_zone']);
        unset($fields['device_push_token']);
        unset($fields['created_at']);
        unset($fields['last_seen']);
        unset($fields['active']);
        
//        $fields['currentSubscription']=function($model){
//            $subscription=null;
//            $subscriptions=$model->devicesSubscribtions;
//            foreach ($subscriptions as $sub){
//                $finalTime=  strtotime(sprintf('+%s months -1 day',$sub->subscription0->durata), $sub->starts_at);
//                if(time()>=$sub->starts_at && time()<=$finalTime){
//                    $subscription=$sub;
//                    break;
//                }
//            }
//            return $subscription;
//        };
//        $fields['subscriptions']=function($model){
//                return $model->devicesSubscribtions;
//        };
        return $fields;
    }
}
