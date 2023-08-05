<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'especialidade' => collect(['Dermatologia', 'Ginecologia', 'Oftalmologia', 'Pediatria'])->random(),
            'cidade_id' => Cidade::all()->random()->id,
        ];
    }
}
