<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Subtitle;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubtitleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subtitle::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'lesson_id' => Lesson::factory(),
            'language' => $this->faker->word(),
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}
