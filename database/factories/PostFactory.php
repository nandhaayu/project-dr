<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author_id' => User::Factory(), //satu user satu tulisan
            //App\Models\Post::factory(100)->recycle(User::factory(5)->cretae())->create(); 
            //membuat banyak tulisan dengan 5 user
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->text(),
            'image' => 'assets/img/default-banner-1.jpg'
        ];
    }
}
