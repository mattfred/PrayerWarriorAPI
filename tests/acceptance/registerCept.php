<?php

// Register a new user
$I = new AcceptanceTester($scenario);
$I->wantTo('Register new user');
$I->lookForwardTo('access app content');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPost('/register', ['first' => 'bob', 'last' => 'jones', 'email' => 'bob@bob.com', 'password' => 'testpassword', 'username' => 'user']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200

// username already saved
$I = new AcceptanceTester($scenario);
$I->wantTo('Register new user');
$I->lookForwardTo('access app content');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPost('/register', ['first' => 'bob', 'last' => 'jones', 'email' => 'bob2@bob.com', 'password' => 'testpassword', 'username' => 'user']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::INTERNAL_SERVER_ERROR); // 200

// email already saved
$I = new AcceptanceTester($scenario);
$I->wantTo('Register new user');
$I->lookForwardTo('access app content');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPost('/register', ['first' => 'bob', 'last' => 'jones', 'email' => 'bob@bob.com', 'password' => 'testpassword', 'username' => 'third']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::INTERNAL_SERVER_ERROR); // 200