<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ci'=> $this->faker->unique()->numerify('#######'),
            'nombres'=> $this->faker->name(),
            'apellidos'=> $this->faker->lastName(),
            'sexo'=> $this->faker->randomElement(['M','F']),
            'celular'=> $this->faker->phoneNumber(),
            'fechaNacimiento'=> $this->faker->date('Y-m-d','2023-01-01'),
            'direccion'=> $this->faker->address(),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
