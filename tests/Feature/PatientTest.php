<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    public function testAuthenticatedUserCanAddPaciente()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $payload = [
            'nome' => 'Matheus Henrique',
            'cpf' => '356.977.450-36',
            'celular' => '(84) 98432-5789',
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->post('/api/pacientes', $payload);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id', 'nome', 'cpf', 'celular', 'created_at', 'updated_at', 'deleted_at'
        ]);

        $response->assertJson([
            'nome' => 'Matheus Henrique',
            'cpf' => '356.977.450-36',
            'celular' => '(84) 98432-5789',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => null,
        ]);
    }

    public function testAuthenticatedUserCanUpdatePaciente()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $patient = Patient::factory()->create();

        $payload = [
            'nome' => 'Luana Rodrigues Garcia1',
            'cpf' => '829.813.342-96',
            'celular' => '(11) 98484-6362',
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->put("/api/pacientes/{$patient->id}", $payload);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id', 'nome', 'cpf', 'celular', 'created_at', 'updated_at', 'deleted_at'
        ]);

        $response->assertJson([
            'id' => $patient->id,
            'cpf' => $patient->cpf,
            'nome' => 'Luana Rodrigues Garcia1',
            'celular' => '(11) 98484-6362',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => null,
        ]);
    }

    public function testAuthenticatedUserCanListMedicosPacientes()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $city = City::factory()->create();
        $doctor = Doctor::factory()->create();

        $patient = Patient::factory()->create();
        $doctor->patients()->attach([$patient->id]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->get("/api/medicos/{$doctor->id}/pacientes");

        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => [
                'id', 'nome', 'cpf', 'celular', 'created_at', 'updated_at', 'deleted_at'
            ],
        ]);

        $response->assertJsonFragment([
            [
                'id' => $patient->id,
                'nome' => $patient->nome,
                'cpf' => $patient->cpf,
                'celular' => $patient->celular,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
        ]);
    }
}
