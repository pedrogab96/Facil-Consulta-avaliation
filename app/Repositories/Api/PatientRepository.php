<?php

namespace App\Repositories\Api;

use App\Models\Patient;
use App\Repositories\Api\CrudRepository;
use Illuminate\Support\Collection;

class PatientRepository extends CrudRepository
{
    protected $resourceType = Patient::class;

    /**
     * Get patients by doctor.
     *
     * @param int $id_medico
     * @return \Illuminate\Support\Collection
     */
    public function getPatientsByDoctor($id_medico): Collection
    {
        return $this->resourceType::query()
            ->whereHas('doctors', function ($query) use ($id_medico) {
                $query->where('medico_id', $id_medico);
            })
            ->get();
    }
}
