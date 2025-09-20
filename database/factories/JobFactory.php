<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job> */
class JobFactory extends Factory
{
  public function definition(): array
{
    return [
        'title' => fake()->jobTitle(),
        'salary' => fake()->randomElement(['$50,000 USD', '$90,000 USD', '$150,000 USD']),
        'employer_id' => \App\Models\Employer::factory(),
    ];
}

}
