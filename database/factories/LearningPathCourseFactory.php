<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LearningPath;
use App\Models\LearningPathCourse;

class LearningPathCourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LearningPathCourse::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'learning_path_id' => LearningPath::factory(),
            'course_id' => $this->faker->word(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(),
        ];
    }
}
