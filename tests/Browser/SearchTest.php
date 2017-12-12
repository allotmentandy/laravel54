<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SearchTest extends DuskTestCase
{
    /**
     * @group search
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://localhost/planes');
            $browser->maximize();
            $browser->type('q', 'I-ADVD');
            $browser->press("search");
            $browser->pause(1000)
                    ->screenshot('planesSearchResult');
            $browser->pause(1000)
                    ->click('.showMore');
            $browser->pause(1000)
                    ->screenshot('planesDetails');
        });
    }
}
