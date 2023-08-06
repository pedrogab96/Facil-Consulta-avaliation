<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PatientResource;
use App\Http\Controllers\Api\CrudController;
use App\Repositories\Api\PatientRepository;
use App\Http\Requests\Api\PatientFormRequest;

class PatientController extends CrudController
{
    /**
     * Get the repository instance.
     *
     * @return PatientRepository
     */
    protected function getRepository()
    {
        return app(PatientRepository::class);
    }

    /**
     * Get the collection resource instance.
     *
     * @param  mixed  $collections
     * @return PatientResource
     */
    public function collectionResource($collection)
    {
        return PatientResource::collection($collection);
    }

    /**
     * Get the model resource.
     *
     * @param $model
     * @return PatientResource
     */
    protected function modelResource($model)
    {
        return new PatientResource($model);
    }

    /**
     * Get the form request instance.
     *
     * @return MedicoFormRequest
     */
    protected function formRequest()
    {
        return app(PatientFormRequest::class);
    }

    /**
     * Get the patients by doctor.
     *
     * @param  int  $id_medico
     * @return \App\Http\Resources\PacienteResource
     */
    public function getPatientsByDoctor($id_medico)
    {
        return $this->collectionResource($this->getRepository()->getPatientsByDoctor($id_medico));
    }
}
