<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

abstract class CrudFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return array_merge_recursive(
            $this->baseRules(),
            $this->isMethod('put') ? $this->editRules() : $this->createRules()
        );
    }

    /**
     * Get the validation rules for editing the resource.
     *
     * @return array
     */
    protected function editRules(): array
    {
        return [];
    }

    /**
     * Get the validation rules for creating the resource.
     *
     * @return array
     */
    protected function createRules(): array
    {
        return [];
    }

    /**
     * Get the base validation rules for both create and edit requests.
     *
     * @return array
     */
    abstract protected function baseRules(): array;
}
