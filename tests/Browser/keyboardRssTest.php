<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class KeyboardTest extends DuskTestCase
{
    /**
     * @group rss
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://localhost/rss/jobs')
                    ->maximize()
                    ->pause(1000)
                    ->click('.btn')
                    ->pause(1000)
                    ->screenshot('rssFeedPopup');
        });






        // read https://github.com/laravel/dusk/blob/master/src/Browser.php
    }
}
