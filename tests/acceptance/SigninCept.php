<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('login user via API');
$I->lookForwardTo('access user data');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPost('/login', ['username' => 'tester', 'password' => 'password10']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
