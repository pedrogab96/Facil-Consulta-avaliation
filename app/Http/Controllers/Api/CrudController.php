<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\CrudRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

abstract class CrudController extends Controller
{
    /**
     * List resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function index(): AnonymousResourceCollection
    {
        return $this->collectionResource($this->getRepository()->index());
    }

    /**
     * Show a resource by ID.
     *
     * @param  int  $id
     * @return mixed
     */
    public function show($id): JsonResource
    {
        return $this->modelResource($this->getRepository()->show($id));
    }

    /**
     * Create a new resource.
     *
     * @return mixed
     */
    public function create(): JsonResource | JsonResponse
    {
        $repository = $this->getRepository();

        try {
            $resource = $repository->create($this->formRequest()->validated());
            return $this->modelResource($resource);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'Ops... Ocorreu um erro não esperado',
            ], 500);
        }
    }

    /**
     * Update a resource by ID.
     *
     * @param  int  $id
     * @return mixed
     */
    public function update(string $id): JsonResource | JsonResponse
    {
        $repository = $this->getRepository();

        try {
            $resource = $repository->find($id);
            $resource = $repository->update($resource, $this->formRequest()->validated());

            return $this->modelResource($resource);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json(['message' => 'Ops... Ocorreu um erro não esperado'], 500);
        }
    }

    /**
     * Get the repository instance.
     *
     * @return mixed
     */
    abstract protected function getRepository(): CrudRepository;


    /**
     * Get the model resource instance.
     *
     * @param  mixed  $model
     * @return mixed
     */
    abstract protected function modelResource(Model $model): JsonResource;

    /**
     * Get the collection resource instance.
     *
     * @param  mixed  $collections
     * @return mixed
     */
    abstract protected function collectionResource(Collection $collections): AnonymousResourceCollection;

    /**
     * Get the form request instance.
     *
     * @return mixed
     */
    abstract protected function formRequest(): FormRequest;
}
