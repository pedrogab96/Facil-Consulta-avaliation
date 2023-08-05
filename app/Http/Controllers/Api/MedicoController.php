<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MedicoResource;
use App\Repositories\Api\MedicoRepository;
use App\Http\Controllers\Api\CrudController;
use App\Http\Requests\Api\MedicoFormRequest;
use App\Http\Requests\Api\MedicoPacienteFormRequest;
use App\Http\Resources\MedicoPacienteResource;
use App\Http\Resources\MedicosResource;

class MedicoController extends CrudController
{
    /**
     * Get the repository instance.
     *
     * @return MedicoRepository
     */
    protected function getRepository()
    {
        return app(MedicoRepository::class);
    }

    /**
     * Get the collection resource.
     *
     * @param $collections
     * @return MedicosResource
     */
    public function collectionResource($collections)
    {
        return MedicosResource::Collection($collections);
    }

    /**
     * Get the model resource.
     *
     * @param $model
     * @return MedicoResource
     */
    protected function modelResource($model)
    {
        return new MedicoResource($model);
    }

    /**
     * Get the form request instance.
     *
     * @return MedicoFormRequest
     */
    protected function formRequest()
    {
        return app(MedicoFormRequest::class);
    }

    /**
     * Get the doctors by city.
     *
     * @param $cidade_id
     * @return MedicosResource
     */
    public function getDoctorsByCity($cidade_id)
    {
        $doctors = $this->getRepository()->getDoctorsByCity($cidade_id);

        return MedicosResource::Collection($doctors);
    }

    /**
     * Link a patient to a doctor.
     *
     * @param MedicoPacienteFormRequest $request
     * @return MedicoPacienteResource
     */
    public function linkPatientToDoctor(MedicoPacienteFormRequest $request)
    {
        $pacientAndDoctors = $this->getRepository()->linkPatientToDoctor($request->validated());

        return new MedicoPacienteResource($pacientAndDoctors);
    }
}
