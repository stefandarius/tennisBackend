<?php

namespace api\tests;

use api\tests\ApiTester;

class DevicesCest {

    public function _before(ApiTester $I) {
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
    }

    public function createUserViaAPI(ApiTester $I) {
        //
        $I->sendPOST('devices', [
            'uuid' => '379c08b5c6b7eb44',
            'device_type' => 'Mobile',
            'device_os' => 'android',
            'os_system_name' => 'M',
            'device_version' => '23',
            'device_manufactured' => 'Genymotion',
            'device_display' => '4.5893899376715',
            'device_time_zone' => 'Europe/Athens',
            'device_push_token' => '123456']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"success":true');
    }

}
