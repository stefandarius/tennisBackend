<?php

namespace api\tests;

use api\tests\ApiTester;

class SaliCest {

    public function _before(ApiTester $I) {
       $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded'); 
    }

    public function getListaSali(ApiTester $I) {
       // $I->wantToTest("Get lista salilor din aplicatie");
        $I->haveHttpHeader('apiKey', '0FFtSxoDKlWq-f5KEzy_sK0vque27RAX');
        $I->sendGET('sala');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"success":true');
    }

}
