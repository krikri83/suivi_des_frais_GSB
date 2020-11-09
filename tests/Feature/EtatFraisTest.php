<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PdoGsb;

class EtatFraisTest extends TestCase
{
    /**
     * @test
     */
    public function selectionnerMoisTest()
    {
        $visiteur  = PdoGsb::getInfosVisiteur('lvillachane','jux7g'); 
        session(['visiteur' => $visiteur]);

        $response = $this->whitSession(['foo' => 'bar'])->get('/');
        $response->assertStatus(200); 
        $response->assertViewHas('lesMois');
       
    }
}
