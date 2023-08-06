<?php

namespace App\Http\Requests\Api;

use App\Rules\Cpf;
use App\Rules\Phone;
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
           'cpf' => ['required', 'unique:pacientes', new Cpf()],
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
            'nome' => ['max:100'],
            'celular' => ['max:20', new Phone()],
        ];
    }
}
