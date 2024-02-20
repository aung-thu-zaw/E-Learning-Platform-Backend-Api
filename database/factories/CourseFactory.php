<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Section;
use App\Models\Subcategory;
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
        return [
            'category_id' => Category::factory(),
            'subcategory_id' => Subcategory::factory(),
            'section_id' => Section::factory(),
            'thumbnail' => $this->faker->word(),
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(),
            'course_description' => $this->faker->text(),
            'project_description' => $this->faker->text(),
            'spread_by_section' => $this->faker->boolean(),
            'level' => $this->faker->randomElement(['beginner', 'intermediate', 'advanced', 'all_levels']),
        ];
    }
}
