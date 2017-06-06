<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('test a failed login');
$I->amOnPage('/login');
// $I->makeScreenshot('login');
// $I->amOnPage('/');
// $I->makeScreenshot('home');
