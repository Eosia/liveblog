<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();

        User::factory(10)
            ->has(Article::factory()->count(rand(5, 10))->hasPhotos(rand(2, 5))->hasLikes(rand(1, 10)))
            ->hasAvatar()
            ->hasComments(15)
            ->create();
    }
}
