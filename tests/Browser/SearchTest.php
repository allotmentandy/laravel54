<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

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
            // $browser->visit('http://localhost/planes');
            $browser->visit('http://localhost/planes/search?q=i-advd');
            $browser->maximize();
            $browser->pause(1000)
                ->screenshot('planesSearchResult');
            $browser->assertSee('I-ADVD');
            // $browser->pause(1000)
            //     ->click('.showMore');
            // $browser->pause(1000)
            //     ->screenshot('planesDetails');
            $browser->pause(1000)
            ->type('#search', "and")
            ->press('GO');

        });
    }
}
