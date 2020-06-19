<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                    ->maximize()
                    ->screenshot('home');
        });

        $this->browse(function ($browser) {
            $browser->visit('http://localhost/planes/list')
                    ->screenshot('planesList')
                    ->assertSee('Private');
        });

        // read https://github.com/laravel/dusk/blob/master/src/Browser.php
    }
}
