<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::where('status', 'active')->pluck('id')->toArray();
        $courses = Course::where('status', 'published')->pluck('id')->toArray();

        return [
            'user_id' => fake()->randomElement($users),
            'course_id' => fake()->randomElement($courses),
            'enrolled_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'completed_at' => fake()->optional()->dateTimeBetween('-1 year', 'now'),
            'progress' => fake()->numberBetween(0, 100),
        ];
    }
}
