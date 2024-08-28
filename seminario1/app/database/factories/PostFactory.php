<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        $slug = Str::slug($title . '-' . Str::random(5));
        return [
            'title' => $title,
            'content' => $this->faker->paragraph(5),
            'slug' => $slug,
        ];
    }
}
