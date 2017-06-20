<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

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
                    ->screenshot('planesList');
        });





        // read https://github.com/laravel/dusk/blob/master/src/Browser.php
    }
}
