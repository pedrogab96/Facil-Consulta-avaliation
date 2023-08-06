<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DoctorResource;
use App\Repositories\Api\DoctorRepository;
use App\Http\Controllers\Api\CrudController;
use App\Http\Requests\Api\DoctorFormRequest;
use App\Http\Requests\Api\DoctorPatientFormRequest;
use App\Http\Resources\DoctorPatientResource;
use App\Http\Resources\DoctorsResource;
use App\Http\Resources\PatientResource;

class DoctorController extends CrudController
{
    /**
     * Get the repository instance.
     *
     * @return DoctorRepository
     */
    protected function getRepository()
    {
        return app(DoctorRepository::class);
    }

    /**
     * Get the collection resource.
     *
     * @param $collections
     * @return DoctorsResource
     */
    public function collectionResource($collections)
    {
        return DoctorsResource::Collection($collections);
    }

    /**
     * Get the model resource.
     *
     * @param $model
     * @return DoctorResource
     */
    protected function modelResource($model)
    {
        return new DoctorResource($model);
    }

    /**
     * Get the form request instance.
     *
     * @return DoctorFormRequest
     */
    protected function formRequest()
    {
        return app(DoctorFormRequest::class);
    }

    /**
     * Get the doctors by city.
     *
     * @param $cidade_id
     * @return DoctorsResource
     */
    public function getDoctorsByCity($cidade_id)
    {
        $doctors = $this->getRepository()->getDoctorsByCity($cidade_id);

        return DoctorsResource::Collection($doctors);
    }

    /**
     * Link a patient to a doctor.
     *
     * @param DoctorPatientFormRequest $request
     * @return DoctorPatientResource
     */
    public function linkPatientToDoctor(DoctorPatientFormRequest $request)
    {
        $pacientAndDoctors = $this->getRepository()->linkPatientToDoctor($request->validated());

        return new DoctorPatientResource($pacientAndDoctors);
    }
}
