<?php

namespace App\database\factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            //
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => $title = $this->faker->sentence(),
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(5, true),
            'status' => Article::STATUS_PUBLISHED,
        ];
    }
}
