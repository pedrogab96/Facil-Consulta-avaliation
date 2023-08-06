<?php

namespace App\Repositories\Api;

use App\Models\City;
use App\Repositories\Api\CrudRepository;

class CityRepository extends CrudRepository
{
    protected $resourceType = City::class;
}
