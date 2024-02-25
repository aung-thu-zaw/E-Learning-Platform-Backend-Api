<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subcategory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $categories = Category::where('status', true)->pluck('id')->toArray();

        return [
            'category_id' => fake()->randomElement($categories),
            'name' => fake()->name(),
            'slug' => fake()->slug(),
            'status' => fake()->boolean(),
        ];
    }
}
