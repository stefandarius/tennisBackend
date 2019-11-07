<?php

namespace api\tests;

use api\tests\ApiTester;

class RapoarteCest {

    public function _before(ApiTester $I) {
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->haveHttpHeader('apikey', '0FFtSxoDKlWq-f5KEzy_sK0vque27RAX');
    }

    public function adaugaDetaliiRaport(ApiTester $I) {
        $I->sendPOST('raport-detalii', [
            'contor' => 2,
            'party' => 116,
            'tip_party' => 6
        ]);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"party":116');
    }

}
