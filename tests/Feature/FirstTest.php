<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FirstTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/404page');
        $response->assertStatus(404);

        $response = $this->get('/');
        $response->assertDontSee('Be right back.');
    }
}
