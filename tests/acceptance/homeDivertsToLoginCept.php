<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('test a non login redirect');
$I->amOnPage('/home');
$I->seeResponseCodeIs(200);
$I->seeCurrentUrlEquals('/login');
