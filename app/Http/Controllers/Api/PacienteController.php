<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PacienteResource;
use App\Http\Controllers\Api\CrudController;
use App\Repositories\Api\PacienteRepository;
use App\Http\Requests\Api\PacienteFormRequest;

class PacienteController extends CrudController
{
    /**
     * Get the repository instance.
     *
     * @return PacienteRepository
     */
    protected function getRepository()
    {
        return app(PacienteRepository::class);
    }

    /**
     * Get the collection resource instance.
     *
     * @param  mixed  $collections
     * @return PacienteResource
     */
    public function collectionResource($collection)
    {
        return PacienteResource::collection($collection);
    }

    /**
     * Get the model resource.
     *
     * @param $model
     * @return PacienteResource
     */
    protected function modelResource($model)
    {
        return new PacienteResource($model);
    }

    /**
     * Get the form request instance.
     *
     * @return MedicoFormRequest
     */
    protected function formRequest()
    {
        return app(PacienteFormRequest::class);
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
