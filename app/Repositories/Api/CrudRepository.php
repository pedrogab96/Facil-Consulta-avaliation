<?php

namespace App\Repositories\Api;

use Illuminate\Support\Facades\DB;

abstract class CrudRepository
{
    protected $resourceType;

    protected $resourceInstance;
    /**
     * Type of the resource to manage.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getInstance()
    {
        if (!isset($this->resourceInstance)) {
            $this->resourceInstance = new ($this->resourceType);
        }

        return $this->resourceInstance;
    }

    /**
     * Create a new query builder instance.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return $this->getInstance()->newQuery();
    }

    /**
     * Get all items from the repository.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return $this->newQuery()->get();
    }

    /**
     * Find an item by its ID.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return $this->newQuery()->findOrFail($id);
    }

    /**
     * Create a new item.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create($attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $resouce = $this->getInstance()->create($attributes);
            $resouce->save();

            return $this->afterSave($resouce, $attributes);
        });
    }

    /**
     * Update an item.
     *
     * @param int $id
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($resouce, $attributes)
    {
        return DB::transaction(function () use ($resouce, $attributes) {
            $resouce->update($attributes);
            $resouce->save();

            return $this->afterSave($resouce, $attributes);
        });
    }

    /**
     * After save.
     *
     * @param \Illuminate\Database\Eloquent\Model $resource
     * @param array $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function afterSave($resource, $attributes)
    {
        return $resource;
    }
}
