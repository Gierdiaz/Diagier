<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = \App\Models\Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'         => $this->faker->word,
            'description'  => $this->faker->text(50),
            'client'       => $this->faker->company,
            'technologies' => $this->faker->words(3, true),
            'start_date'   => $this->faker->date,
            'end_date'     => $this->faker->date,
            'budget'       => $this->faker->randomFloat(2, 1000, 100000),
            'status'       => $this->faker->randomElement(['progress', 'completed', 'suspended']),
            'developer_id' => \App\Models\Developer::factory(),
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    }
}
