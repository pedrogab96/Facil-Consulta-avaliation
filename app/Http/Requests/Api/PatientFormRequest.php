<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PatientFormRequest extends CrudFormRequest
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
           'cpf' => ['required'],
           'celular' => ['required'],
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
            'cpf' => ['max:20'],
        ];
    }
}
