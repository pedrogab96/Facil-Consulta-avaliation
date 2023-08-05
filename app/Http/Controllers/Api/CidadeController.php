<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CidadeResource;
use App\Repositories\Api\CidadeRepository;
use App\Http\Controllers\Api\CrudController;
use App\Http\Requests\Api\CidadeFormRequest;

class CidadeController extends CrudController
{
    /**
     * Get the repository instance.
     *
     * @return CidadeRepository
     */
    protected function getRepository()
    {
        return app(CidadeRepository::class);
    }

    /**
     * Get the collection resource.
     *
     * @param $collections
     * @return CidadeResource
     */
    public function collectionResource($collection)
    {
        return CidadeResource::Collection($collection);
    }

    /**
     * Get the model resource.
     *
     * @param $model
     * @return CidadeResource
     */
    protected function modelResource($model)
    {
        return new CidadeResource($model);
    }

    /**
     * Get the form request instance.
     *
     * @return CidadeFormRequest
     */
    protected function formRequest()
    {
        return app(CidadeFormRequest::class);
    }
}
