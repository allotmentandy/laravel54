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
                    ->resize(1024, 768)
                    ->assertSee('Laravel')
                    ->screenshot('home');
        });

        $this->browse(function ($browser) {
            $browser->visit('http://localhost/planes/list')
                    ->resize(1024, 768)
                    ->screenshot('planesList');
        });





        // read https://github.com/laravel/dusk/blob/master/src/Browser.php
    }
}
