<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CityResource;
use App\Repositories\Api\CityRepository;
use App\Http\Controllers\Api\CrudController;
use App\Http\Requests\Api\CityFormRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CityController extends CrudController
{
    /**
     * Get the repository instance.
     *
     * @return CityRepository
     */
    protected function getRepository(): CityRepository
    {
        return app(CityRepository::class);
    }

    /**
     * Get the collection resource.
     *
     * @param $collections
     * @return AnonymousResourceCollection
     */
    public function collectionResource(Collection $collection): AnonymousResourceCollection
    {
        return CityResource::Collection($collection);
    }

    /**
     * Get the model resource.
     *
     * @param $model
     * @return CityResource
     */
    protected function modelResource(Model $model): CityResource
    {
        return new CityResource($model);
    }

    /**
     * Get the form request instance.
     *
     * @return CityFormRequest
     */
    protected function formRequest(): CityFormRequest
    {
        return app(CityFormRequest::class);
    }
}
