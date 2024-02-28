<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    protected $model = \App\Models\Feedback::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment'     => $this->faker->text,
            'reviewer'    => $this->faker->name,
            'attachments' => $this->faker->text,
            'rating'      => $this->faker->numberBetween(1, 5),
            'feedback'    => $this->faker->randomElement(['positive', 'negative', 'neutral']),
            'task_id'     => \App\Models\Task::factory(),
            'user_id'     => \App\Models\User::factory(),
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }
}
