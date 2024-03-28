<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseIntroVideo>
 */
class CourseIntroVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'video_file_name' => fake()->randomElement(['intro-1.mp4', 'intro-2.mp4', 'intro-3.mp4', 'intro-4.mp4', 'intro-5.mp4', 'intro-6.mp4']),
            'video_file_type' => 'mp4',
        ];
    }
}
