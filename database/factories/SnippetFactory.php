<?php

namespace Database\Factories;

use App\Enums\Languages;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Snippet>
 */
class SnippetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->text('40'),
            'description' => fake()->text(),
            'content' => prettyHTML(fake()->randomHtml()),
            'lang_id' => langs()->id('html'),
            'views' => fake()->numberBetween(0, 10_000),
            'likes' => fake()->numberBetween(0, 5_000),
            'dislikes' => fake()->numberBetween(0, 5_000)
        ];
    }
}
