<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'custom_id' => get_unique_string('blogs'),
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->realTextBetween(100, 10000),
            'image' => $this->faker->imageUrl(966, 588),
            'admin_id' => Admin::find(1),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
