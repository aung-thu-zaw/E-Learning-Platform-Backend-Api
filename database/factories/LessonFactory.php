<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $sectionIds = Section::pluck('id')->toArray();

        return [
            'section_id' => fake()->randomElement($sectionIds),
            'title' => fake()->sentence(4),
            'uuid' => fake()->uuid(),
            'video_file_name' => fake()->randomElement(['intro-1.mp4', 'intro-2.mp4', 'intro-3.mp4', 'intro-4.mp4', 'intro-5.mp4', 'intro-6.mp4']),
            'duration_seconds' => fake()->numberBetween(180, 2700),
        ];
    }
}
