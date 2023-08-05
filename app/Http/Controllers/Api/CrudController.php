<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    /**
     * List resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function index()
    {
        return $this->collectionResource($this->getRepository()->index());
    }

    /**
     * Show a resource by ID.
     *
     * @param  int  $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->modelResource($this->getRepository()->show($id));
    }

    /**
     * Create a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        $repository = $this->getRepository();

        if ($resource = $repository->create($this->formRequest()->validated())) {
            return $this->modelResource($resource);
        }

        return abort(500);
    }

    /**
     * Update a resource by ID.
     *
     * @param  int  $id
     * @return mixed
     */
    public function update($id)
    {
        $repository = $this->getRepository();

        $resource = $repository->find($id);

        if ($resource = $repository->update($resource, $this->formRequest()->validated())) {
            return $this->modelResource($resource);
        }

        return abort(500);
    }

    /**
     * Get the repository instance.
     *
     * @return mixed
     */
    abstract protected function getRepository();


    /**
     * Get the model resource instance.
     *
     * @param  mixed  $model
     * @return mixed
     */
    abstract protected function modelResource($model);

    /**
     * Get the collection resource instance.
     *
     * @param  mixed  $collections
     * @return mixed
     */
    abstract protected function collectionResource($collections);

    /**
     * Get the form request instance.
     *
     * @return mixed
     */
    abstract protected function formRequest();
}
