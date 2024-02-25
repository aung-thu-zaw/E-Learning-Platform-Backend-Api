<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\BlogContent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogContent::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $categories = BlogCategory::where('status', true)->pluck('id')->toArray();
        $authors = User::where('role', 'admin')->pluck('id')->toArray();

        return [
            'blog_category_id' => fake()->randomElement($categories),
            'author_id' => fake()->randomElement($authors),
            'title' => fake()->sentence(),
            'thumbnail' => fake()->imageUrl(),
            'content' => fake()->paragraphs(3, true),
            'status' => fake()->randomElement(['draft', 'published']),
            'published_at' => fake()->dateTime(),
        ];
    }
}
