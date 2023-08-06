<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DoctorResource;
use App\Repositories\Api\DoctorRepository;
use App\Http\Controllers\Api\CrudController;
use App\Http\Requests\Api\DoctorFormRequest;
use App\Http\Requests\Api\DoctorPatientFormRequest;
use App\Http\Resources\DoctorPatientResource;
use App\Http\Resources\DoctorsResource;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DoctorController extends CrudController
{
    /**
     * Get the repository instance.
     *
     * @return DoctorRepository
     */
    protected function getRepository(): DoctorRepository
    {
        return app(DoctorRepository::class);
    }

    /**
     * Get the collection resource.
     *
     * @param $collections
     * @return AnonymousResourceCollection
     */
    public function collectionResource(Collection $collections): AnonymousResourceCollection
    {
        return DoctorsResource::Collection($collections);
    }

    /**
     * Get the model resource.
     *
     * @param $model
     * @return DoctorResource
     */
    protected function modelResource(Model $model): DoctorResource
    {
        return new DoctorResource($model);
    }

    /**
     * Get the form request instance.
     *
     * @return DoctorFormRequest
     */
    protected function formRequest(): DoctorFormRequest
    {
        return app(DoctorFormRequest::class);
    }

    /**
     * Get the doctors by city.
     *
     * @param $cidade_id
     * @return AnonymousResourceCollection
     */
    public function getDoctorsByCity(string $cidade_id): AnonymousResourceCollection
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
    public function linkPatientToDoctor(DoctorPatientFormRequest $request): DoctorPatientResource
    {
        $pacientAndDoctors = $this->getRepository()->linkPatientToDoctor($request->validated());

        return new DoctorPatientResource($pacientAndDoctors);
    }
}
