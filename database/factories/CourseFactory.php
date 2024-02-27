<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Section;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {

        $categories = Category::pluck("id")->toArray();
        $subcategories = Subcategory::pluck("id")->toArray();
        $instructors = User::where("role", "instructor")->pluck("id")->toArray();

        return [
            'category_id' => fake()->randomElement($categories),
            'subcategory_id' => fake()->randomElement($subcategories),
            'instructor_id' => fake()->randomElement($instructors),
            'thumbnail' => fake()->imageUrl(),
            'title' => fake()->sentence(4),
            'slug' => fake()->slug(),
            'course_description' => fake()->paragraph(),
            'project_description' => fake()->paragraph(),
            'level' => fake()->randomElement(['beginner', 'intermediate', 'advanced', 'all_levels']),
            'status' => fake()->randomElement(['draft', 'pending','published','rejected']),
        ];
    }
}
