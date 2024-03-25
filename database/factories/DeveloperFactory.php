<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DeveloperFactory extends Factory
{
    protected $model = \App\Models\Developer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'           => $this->faker->name,
            'email'          => $this->faker->unique()->safeEmail,
            'github'         => $this->faker->unique()->userName,
            'bio'            => $this->faker->text,
            'technologies'   => $this->faker->words(3, true),
            'college'        => $this->faker->word,
            'course'         => $this->faker->word,
            'certifications' => $this->faker->text,
            'company'        => $this->faker->company,
            'level'          => $this->faker->randomElement([
                'intern', 'junior', 'intermediate', 'senior', 'lead', 'manager',
                'director', 'vp', 'executive', 'admin', 'specialist', 'consultant',
            ]),
            'city'       => $this->faker->city,
            'state'      => $this->faker->state,
            'country'    => $this->faker->country,
            'work_mode'  => $this->faker->randomElement(['home_office', 'presential', 'hybrid']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
