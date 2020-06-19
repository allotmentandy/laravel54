<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('test a failed login');
$I->amOnPage('/login');
$I->fillField('email', 'no@nourl.co.uk');
$I->fillField('password', 'password');
$I->click('button');
$I->see('These credentials do not match our records.');
