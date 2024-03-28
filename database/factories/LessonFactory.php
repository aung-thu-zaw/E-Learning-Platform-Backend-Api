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
        $sectionIds = Section::pluck('id')->toArray();

        return [
            'section_id' => fake()->randomElement($sectionIds),
            'title' => fake()->sentence(4),
            'slug' => fake()->slug(),
            'video_path' => fake()->randomElement(["https://www.youtube.com/watch?v=GBdO5myZNsQ&list=PL4cUxeGkcC9haQlqdCQyYmL_27TesCGPC","https://www.youtube.com/watch?v=thHPEotZVdA&list=PL4cUxeGkcC9haQlqdCQyYmL_27TesCGPC&index=2","https://www.youtube.com/watch?v=ovJfnoqUBk8&list=PL4cUxeGkcC9haQlqdCQyYmL_27TesCGPC&index=3","https://www.youtube.com/watch?v=QS8MwC8S4o8&list=PL4cUxeGkcC9haQlqdCQyYmL_27TesCGPC&index=4","https://www.youtube.com/watch?v=X9ta1grG1j0&list=PL4cUxeGkcC9haQlqdCQyYmL_27TesCGPC&index=5","https://www.youtube.com/watch?v=LZDQhOaBBbk&list=PL4cUxeGkcC9haQlqdCQyYmL_27TesCGPC&index=6","https://www.youtube.com/watch?v=dvanqBUoxhc&list=PL4cUxeGkcC9haQlqdCQyYmL_27TesCGPC&index=7","https://www.youtube.com/watch?v=tGhMaMIYRiI&list=PL4cUxeGkcC9haQlqdCQyYmL_27TesCGPC&index=8","https://www.youtube.com/watch?v=SUfx1y6XO9c&list=PL4cUxeGkcC9haQlqdCQyYmL_27TesCGPC&index=9"]),
            'duration_seconds' => fake()->numberBetween(180, 2700),
            'is_completed' => fake()->boolean()
        ];
    }
}
