<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\CrudFormRequest;

class CidadeFormRequest extends CrudFormRequest
{
    /**
     * Get the validation rules for creating the resource.
     *
     * @return array
     */
    protected function createRules(): array
    {
        return [
           'nome' => ['required'],
           'especialidade' => ['required'],
           'cidade_id' => ['required'],
        ];
    }

    /**
     * Get the base validation rules for both create and edit requests.
     *
     * @return array
     */
    protected function baseRules(): array
    {
        return [
            'nome' => ['max:100', 'max:100'],
            'especialidade' => ['min:1', 'max:100'],
            'cidade_id' => ['exists:cidades,id'],
        ];
    }
}
