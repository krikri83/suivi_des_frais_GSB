<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use MyDate;

class MyDateTest extends TestCase
{
    /**Console:
     * php artisan make : test connexionTest
     * Test:
     * vendor/bin/phpunit
     *
     * @test
     */
    public function extrationDuMoiDuChampMois()
    {
        $date = MyDate::extraireMois('201901');
        $this->assertEquals('01',$date);
    }
     /**
     *
     * @test
     */
    public function extrationDuAnnee()
    {
        $date = MyDate::extraireAnnee('201901');
        $this->assertEquals('2019',$date);
    }
}
