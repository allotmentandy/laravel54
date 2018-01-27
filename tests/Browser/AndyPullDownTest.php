<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

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
