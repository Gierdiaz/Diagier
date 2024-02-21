<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = \App\Models\Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text(50),
            'comments' => $this->faker->text,
            'sprint' => $this->faker->date,
            'priority' => $this->faker->randomElement(['high', 'medium', 'low']),
            'status' => $this->faker->randomElement(['to-do', 'progress', 'completed']),
            'developer_id' => \App\Models\Developer::factory(),
            'project_id' => \App\Models\Project::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
