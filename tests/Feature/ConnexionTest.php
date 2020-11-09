<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConnexionTest extends TestCase
{
    /**
     * @test
     */
    public function retourneFormulaireConnexion()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText('Login*');
        $response->assertSeeText('Mot de passe*');
    }
    /**
     * Ligne 16, on simule la demande de connexion (la route est ‘/’)
     * Ligne 17, on teste si la réponse http est 200 (url trouvée)
     * Ligne 18, on teste si le texte « Login* » est présent dans la page retournée
     * Ligne 19, la même chose avec le mot de passe
     * On peut ainsi faire plusieurs assertions dans la même méthode
     * Dans la console, on peut tester qu’une seule classe avec l’option –filter
     * Le résultat annonce bien 1 test et 3 assertions ok
     * Console:
     * php artisan make : test connexionTest
     * Test:
     * vendor/bin/phpunit --filter ConnexionTest
     * @test
     */
    
    public function valideLaConnexionConforme()
    {
        $data = ['login'=>'lvillachane','mdp'=>'jux7g'];
        $response = $this->post('/',$data);
        $response->assertStatus(200);
        $response->assertSessionHas('visiteur');
        $response->assertSeeText('Villechalane Louis');
    }
    /**
     * @test
     */
    public function echecIdentificationDeConnexion()
    {
        $data = ['login'=>'toto','mdp'=>'toto'];
        $response = $this->post('/',$data);
        $response->assertStatus(200);
        $response->assertSessionMissing('visiteur');
        $response->assertSeeText('Login*');
        $response->assertSeeText('Mot de passe*');
    }
}
