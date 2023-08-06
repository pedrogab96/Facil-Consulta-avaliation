<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

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

    public function linkPatientsToDoctor(Collection $doctors): void
    {
        $patients = Patient::all();

        $doctors->each(function ($doctor) use ($patients) {
            $doctor->patients()->attach(
                $patients->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
