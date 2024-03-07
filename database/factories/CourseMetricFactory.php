<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseMetric>
 */
class CourseMetricFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = Course::pluck("id")->toArray();

        return [
            "course_id" => fake()->randomElement($courses),
            "views" => fake()->randomNumber(),
            "enrollments" => fake()->randomNumber(),
            "rating" => fake()->randomNumber(),
        ];
    }
}
