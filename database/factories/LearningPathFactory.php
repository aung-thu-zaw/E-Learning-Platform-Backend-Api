<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LearningPath;
use App\Models\User;

class LearningPathFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LearningPath::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'creator' => $this->faker->word(),
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'materials' => $this->faker->word(),
            'final_product' => $this->faker->word(),
            'level' => $this->faker->randomElement(["beginner","intermediate","advanced","all_levels"]),
            'creator_id' => User::factory(),
        ];
    }
}
