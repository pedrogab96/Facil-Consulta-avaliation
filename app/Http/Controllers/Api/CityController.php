<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CityResource;
use App\Repositories\Api\CityRepository;
use App\Http\Controllers\Api\CrudController;
use App\Http\Requests\Api\CityFormRequest;

class CityController extends CrudController
{
    /**
     * Get the repository instance.
     *
     * @return CityRepository
     */
    protected function getRepository()
    {
        return app(CityRepository::class);
    }

    /**
     * Get the collection resource.
     *
     * @param $collections
     * @return CityResource
     */
    public function collectionResource($collection)
    {
        return CityResource::Collection($collection);
    }

    /**
     * Get the model resource.
     *
     * @param $model
     * @return CityResource
     */
    protected function modelResource($model)
    {
        return new CityResource($model);
    }

    /**
     * Get the form request instance.
     *
     * @return CityFormRequest
     */
    protected function formRequest()
    {
        return app(CityFormRequest::class);
    }
}
