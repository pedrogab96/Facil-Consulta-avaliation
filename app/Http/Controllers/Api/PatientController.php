<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PatientResource;
use App\Http\Controllers\Api\CrudController;
use App\Repositories\Api\PatientRepository;
use App\Http\Requests\Api\PatientFormRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PatientController extends CrudController
{
    /**
     * Get the repository instance.
     *
     * @return PatientRepository
     */
    protected function getRepository(): PatientRepository
    {
        return app(PatientRepository::class);
    }

    /**
     * Get the collection resource instance.
     *
     * @param  mixed  $collections
     * @return PatientResource
     */
    public function collectionResource(Collection $collection): AnonymousResourceCollection
    {
        return PatientResource::collection($collection);
    }

    /**
     * Get the model resource.
     *
     * @param $model
     * @return PatientResource
     */
    protected function modelResource(Model $model): PatientResource
    {
        return new PatientResource($model);
    }

    /**
     * Get the form request instance.
     *
     * @return MedicoFormRequest
     */
    protected function formRequest(): PatientFormRequest
    {
        return app(PatientFormRequest::class);
    }

    /**
     * Get the patients by doctor.
     *
     * @param  int  $id_medico
     * @return \App\Http\Resources\PacienteResource
     */
    public function getPatientsByDoctor(string $id_medico): AnonymousResourceCollection
    {
        return PatientResource::collection($this->getRepository()->getPatientsByDoctor($id_medico));
    }
}
