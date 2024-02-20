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
        return [
            'section_id' => Section::factory(),
            'course_id' => Course::factory(),
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(),
            'thumbnail' => $this->faker->word(),
            'video_path' => $this->faker->word(),
            'description' => $this->faker->text(),
            'duration_seconds' => $this->faker->word(),
        ];
    }
}
