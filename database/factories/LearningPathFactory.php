<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\LearningPath;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $creator = User::where('role', 'admin')->pluck('id')->toArray();

        return [
            'image' => fake()->imageUrl(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'materials' => fake()->sentence(),
            'final_product' => fake()->sentence(),
            'level' => fake()->randomElement(['beginner', 'intermediate', 'advanced', 'all_levels']),
            'creator_id' => fake()->randomElement($creator),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (LearningPath $learningPath) {
            $courses = Course::inRandomOrder()->limit(rand(4, 8))->get();
            $tags = Tag::inRandomOrder()->limit(rand(2, 4))->get();

            $learningPath->courses()->attach($courses);
            $learningPath->tags()->attach($tags);
        });
    }
}
