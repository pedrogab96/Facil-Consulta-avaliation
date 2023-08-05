<?php

namespace App\Repositories\Api;

use App\Models\Medico;
use App\Repositories\Api\CrudRepository;

class MedicoRepository extends CrudRepository
{
    protected $resourceType = Medico::class;

    /**
     * Get doctors by city.
     *
     * @param int $cidade_id
     * @return \Illuminate\Support\Collection
     */
    public function getDoctorsByCity($cidade_id)
    {
        return $this->resourceType::where('cidade_id', $cidade_id)->get();
    }

    /**
     * Link patient to doctor.
     *
     * @param array $attributes
     * @return \Illuminate\Support\Collection
     */
    public function linkPatientToDoctor($attributes)
    {
        $doctorId = $attributes['medico_id'];
        $patientId = $attributes['paciente_id'];

        $doctor = $this->resourceType::find($doctorId);

        $doctor->patients()->syncWithoutDetaching([$patientId]);

        $patient = $doctor->patients()->find($patientId);

        return collect([
            'patient' => $patient,
            'doctor' => $doctor,
        ]);
    }
}
