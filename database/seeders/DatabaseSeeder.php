<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Comment::factory(2500)->create();
        \App\Models\Image::factory(2500)->create();
        \App\Models\Video::factory(500)->create();
        \App\Models\Tag::factory(50)->create();
        \App\Models\Post::factory(1500)->create();
    }
}
