<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorPatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $doctor = $this->resource->get('doctor');
        $patient = $this->resource->get('patient');

        return [
            'medico' => [
                'id' => $doctor?->id,
                'nome' => $doctor?->nome,
                'especialidade' => $doctor?->especialidade,
                'cidade_id' => $doctor?->cidade_id,
                'created_at' => $doctor?->created_at,
                'updated_at' => $doctor?->updated_at,
                'deleted_at' => $doctor?->deleted_at,
            ],
            'paciente' => [
                'id' => $patient?->id,
                'nome' => $patient?->nome,
                'cpf' => $patient?->cpf,
                'celular' => $patient?->celular,
                'created_at' => $patient?->created_at,
                'updated_at' => $patient?->updated_at,
                'deleted_at' => $patient?->deleted_at,
            ],
        ];
    }
}
