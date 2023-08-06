<?php

namespace Tests\Feature;

use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    public function testListCities()
    {
        $cities = [
            [
                'id' => 1,
                'nome' => 'Curitiba',
                'estado' => 'Paraná',
            ],
            [
                'id' => 2,
                'nome' => 'Pelotas',
                'estado' => 'Rio Grande do Sul',
            ],
        ];

        City::insert($cities);

        $response = $this->get('api/cidades');

        $response->assertStatus(200);
        $response->assertExactJson($cities);
    }
}
