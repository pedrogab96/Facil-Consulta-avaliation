<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DoctorTest extends TestCase
{
    use RefreshDatabase;

    public function testListDoctors()
    {
        $city = City::factory()->create();

        $doctors = [
            [
                'id' => 1,
                'nome' => 'Daniella Gabrielle Corona Jr.',
                'especialidade' => 'Oftalmologia',
                'cidade_id' => $city->id,
            ],
            [
                'id' => 2,
                'nome' => 'Lúcia Malena Rocha',
                'especialidade' => 'Pediatria',
                'cidade_id' => $city->id,
            ],
        ];
        Doctor::insert($doctors);

        $response = $this->get('api/medicos');
        $response->assertStatus(200);

        $response->assertExactJson($doctors);
    }

    public function testCreateDoctorWithAuthentication()
    {
        $user = User::factory()->create();
        $city = City::factory()->create();
        $token = auth()->login($user);

        $doctor = [
            'nome' => 'Dra. Alessandra Moura',
            'especialidade' => 'Neurologista',
            'cidade_id' => $city->id,
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->post('/api/medicos', $doctor);

        $response->assertStatus(201)
            ->assertJson($doctor);

        $this->assertDatabaseHas('medicos', $doctor);
    }

    public function testCreateDoctorWithInvalidData()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $invalidDoctorData = [
            'especialidade' => 'Neurologista',
            'cidade_id' => 5,
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->post('/api/medicos', $invalidDoctorData);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['nome', 'cidade_id']);
        $this->assertDatabaseMissing('medicos', $invalidDoctorData);
    }

    public function testCreateDoctorWithoutAuthentication()
    {
        $doctor = [
            'nome' => 'John Doe',
            'especialidade' => 'Neurologista',
            'cidade_id' => 5,
        ];

        $response = $this->withHeaders([
                'Accept' => 'application/json',
            ])
            ->post('api/medicos', $doctor);

        $response->assertStatus(401);
        $this->assertDatabaseMissing('medicos', $doctor);
    }

    public function testLinkDoctorToPatients()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        City::factory()->create();
        $doctor = Doctor::factory()->create();
        $patient = Patient::factory()->create();

        $payload = [
            'medico_id' => $doctor->id,
            'paciente_id' => $patient->id,
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->post("/api/medicos/{$doctor->id}/pacientes", $payload);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'medico' => [
                'id', 'nome', 'especialidade', 'cidade_id', 'created_at', 'updated_at', 'deleted_at'
            ],
            'paciente' => [
                'id', 'nome', 'cpf', 'celular', 'created_at', 'updated_at', 'deleted_at'
            ],
        ]);

        $response->assertJson([
            'medico' => [
                'id' => $doctor->id,
                'nome' => $doctor->nome,
                'especialidade' => $doctor->especialidade,
                'cidade_id' => $doctor->cidade_id,
            ],
            'paciente' => [
                'id' => $patient->id,
                'nome' => $patient->nome,
                'cpf' => $patient->cpf,
                'celular' => $patient->celular,
            ],
        ]);
    }

    public function testListDoctorsOfCity()
    {

        $city = City::factory()->create();
        $doctor = Doctor::factory()->create();

        $response = $this->get("/api/cidades/{$city->id}/medicos");
        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => [
                'id', 'nome', 'especialidade', 'cidade_id'
            ],
        ]);

        $response->assertJsonFragment([
            [
                'id' => $doctor->id,
                'nome' => $doctor->nome,
                'especialidade' => $doctor->especialidade,
                'cidade_id' => $doctor->cidade_id,
            ],
        ]);
    }
}
