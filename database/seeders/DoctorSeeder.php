<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = Doctor::factory()->count(10)->create();
        $this->linkPatientsToDoctor($doctors);
    }

    public function linkPatientsToDoctor($doctors)
    {
        $patients = Patient::all();

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
