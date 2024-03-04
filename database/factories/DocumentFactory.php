<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition()
    {
        return [
            'name'            => $this->faker->sentence(3),
            'description'     => $this->faker->paragraph,
            'type'            => $this->faker->randomElement(['Contract', 'Specification', 'Report']),
            'file'            => Storage::disk('documents')->put('', $this->faker->paragraph . '.txt'),
            'visibility'      => $this->faker->randomElement(['private', 'public']),
            'expiration_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'uploaded_by'     => \App\Models\User::factory(),
        ];
    }
}
