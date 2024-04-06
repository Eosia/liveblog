<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => $title = $this->faker->sentence(),
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(5, true),
            'status' => Article::STATUS_PUBLISHED,
        ];
    }
}
