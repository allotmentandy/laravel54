<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class AndyPullDownTest extends DuskTestCase
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
            $browser->visit('http://localhost/')
                    ->maximize()
                    ->pause(1000)
                    ->click('#toggleText')
                    ->pause(1000)
                    ->screenshot('aboutAndy')
                    ->assertSee('About Andy');
        });

        // read https://github.com/laravel/dusk/blob/master/src/Browser.php
    }
}
