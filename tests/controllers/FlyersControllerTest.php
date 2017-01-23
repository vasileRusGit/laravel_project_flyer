<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FlyersControllerTest extends TestCase
{
    /** @test */
    public function itShowsTheFormToCreateANewFlyer()
    {
        $this->visit('flyers/create');
    }
}