<?php

namespace App\Repositories\Api;

use App\Models\Cidade;
use App\Repositories\Api\CrudRepository;

class CidadeRepository extends CrudRepository
{
    protected $resourceType = Cidade::class;
}
