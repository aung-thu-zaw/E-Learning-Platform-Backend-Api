<?php

namespace Database\Factories;

use App\Models\Course;
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
        $courseIds = Course::pluck("id")->toArray();

        return [
            'course_id' => fake()->randomElement($courseIds),
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(),
            'video_path' => $this->faker->word(),
            'duration_seconds' => fake()->randomNumber(),
        ];
    }
}
