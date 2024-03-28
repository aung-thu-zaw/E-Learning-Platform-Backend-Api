<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courseId = Course::where('status', 'published')->pluck('id')->toArray();

        return [
            'course_id' => fake()->randomElement($courseId),
            'title' => fake()->sentence(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Section $section) {
            Lesson::factory()->count(rand(5, 20))->create(['section_id' => $section->id]);
        });
    }
}
