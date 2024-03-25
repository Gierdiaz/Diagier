<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->firstName,
            'surname'     => $this->faker->lastName,
            'email'       => $this->faker->unique()->safeEmail,
            'company'     => $this->faker->company,
            'position'    => $this->faker->jobTitle,
            'phone'       => $this->faker->phoneNumber,
            'observation' => $this->faker->optional()->realText(),
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }
}
