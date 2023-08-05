<?php

namespace App\Repositories\Api;

use App\Models\Paciente;
use App\Repositories\Api\CrudRepository;

class PacienteRepository extends CrudRepository
{
    protected $resourceType = Paciente::class;

    /**
     * Get patients by doctor.
     *
     * @param int $id_medico
     * @return \Illuminate\Support\Collection
     */
    public function getPatientsByDoctor($id_medico)
    {
        return $this->resourceType::query()
            ->join('medico_paciente', 'pacientes.id', '=', 'medico_paciente.paciente_id')
            ->where('medico_id', $id_medico)
            ->get();
    }
}
