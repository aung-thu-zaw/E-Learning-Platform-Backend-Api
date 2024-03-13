<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $categories = Category::pluck('id')->toArray();
        $category_id = fake()->randomElement($categories);
        $subcategories = Subcategory::where('category_id', $category_id)->pluck('id')->toArray();
        $instructors = User::where('role', 'instructor')->pluck('id')->toArray();

        return [
            'uuid' => fake()->uuid(),
            'category_id' => $category_id,
            'subcategory_id' => fake()->randomElement($subcategories),
            'instructor_id' => fake()->randomElement($instructors),
            'thumbnail' => fake()->imageUrl(),
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'course_description' => fake()->paragraph(),
            'project_description' => fake()->paragraph(),
            'duration_seconds' => fake()->numberBetween(3600, 36000),
            'level' => fake()->randomElement(['beginner', 'intermediate', 'advanced', 'all_levels']),
            'status' => fake()->randomElement(['draft', 'pending', 'published', 'rejected']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Course $course) {
            // Get all tags for the given category and subcategory
            $tags = Tag::where('category_id', $course->category_id)
                ->where('subcategory_id', $course->subcategory_id)
                ->pluck('id'); // Pluck the tag IDs

            // Choose a random number of tags to attach (between 1 and the total number of tags available)
            $numberOfTags = rand(1, $tags->count());

            // Shuffle the tag IDs and take the required number of random IDs
            $randomTagIds = $tags->shuffle()->take($numberOfTags);

            // Attach the random tags to the course
            $course->tags()->attach($randomTagIds);
        });
    }
}
