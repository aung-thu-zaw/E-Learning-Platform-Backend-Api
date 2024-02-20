<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(4),
            'thumbnail' => $this->faker->word(),
            'submission' => $this->faker->word(),
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}
