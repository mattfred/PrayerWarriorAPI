<?php

// log user in successfully
$I = new AcceptanceTester($scenario);
$I->wantTo('login user via API');
$I->lookForwardTo('access user data');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPost('/login', ['username' => 'tester', 'password' => 'password10']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200

// provide wrong password
$I = new AcceptanceTester($scenario);
$I->wantTo('login user via API');
$I->lookForwardTo('access user data');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPost('/login', ['username' => 'tester', 'password' => 'password']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::UNAUTHORIZED); // 401

// use a username that is not found
$I = new AcceptanceTester($scenario);
$I->wantTo('login user via API');
$I->lookForwardTo('access user data');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPost('/login', ['username' => 'test', 'password' => 'password']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::NOT_FOUND); // 404