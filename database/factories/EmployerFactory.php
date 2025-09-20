<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer> */
class EmployerFactory extends Factory
{
   public function definition(): array
{
    return [
        'name' => fake()->company(),
    ];
}

}
