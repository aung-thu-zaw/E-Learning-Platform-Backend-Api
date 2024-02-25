<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $categories = Category::pluck("id")->toArray();
        $subcategories = Subcategory::pluck("id")->toArray();

        return [
            'category_id' => fake()->randomElement($categories),
            'subcategory_id' =>  fake()->randomElement($subcategories),
            'name' => fake()->name(),
            'slug' => fake()->slug(),
        ];
    }
}
