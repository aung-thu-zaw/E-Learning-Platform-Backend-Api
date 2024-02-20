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
        return [
            'category_id' => BlogCategory::factory(),
            'author_id' => User::factory(),
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(),
            'thumbnail' => $this->faker->word(),
            'content' => $this->faker->paragraphs(3, true),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'published_at' => $this->faker->dateTime(),
            'blog_category_id' => BlogCategory::factory(),
        ];
    }
}
