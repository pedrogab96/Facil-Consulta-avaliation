<?php

namespace Database\Seeders;

use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = Medico::factory()->count(10)->create();
        $this->linkPatientsToDoctor($doctors);
    }

    public function linkPatientsToDoctor($doctors)
    {
        $patients = Paciente::all();

        $doctors->each(function ($doctor) use ($patients) {
            $doctor->patients()->attach(
                $patients->random(rand(1, 3))->pluck('id')->toArray(),
                [
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        });
    }
}
