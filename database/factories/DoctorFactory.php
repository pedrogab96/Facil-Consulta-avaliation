<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
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
            'cidade_id' => City::all()->random()->id,
        ];
    }
}
