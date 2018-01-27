<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

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
            $browser->visit('http://localhost/rss/')
                    ->assertSee("Job");
        });

        // $this->browse(function ($browser) {
        // $browser->visit('http://localhost/rss/jobs')
        // ->maximize()
        // ->pause(10000)
        // ->click('.btn')
        // ->pause(1000)
        // ->screenshot('rssFeedPopup')
        // ->keys('.btn', ['{RETURN_KEY}', '']);
        // });

        // read https://github.com/laravel/dusk/blob/master/src/Browser.php
    }
}
