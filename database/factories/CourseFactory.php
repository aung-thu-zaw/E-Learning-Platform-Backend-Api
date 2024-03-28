<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
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
            'intro_video_path' => fake()->randomElement(["intro-1.mp4","intro-2.mp4","intro-3.mp4","intro-4.mp4","intro-5.mp4","intro-6.mp4"]),
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'course_description' => "<p>Are you tired of populating your Laravel applications with mundane, repetitive data during development and testing phases? Look no further! This comprehensive course on generating fake data in Laravel will equip you with the skills and knowledge to streamline your development process by automating the creation of realistic, yet fictional data sets.</p><p><br></p><p><br></p><p>Throughout this course, you will dive deep into Laravel's built-in Faker library, a powerful tool designed to generate various types of fake data with ease. Whether you're building a new application prototype, testing complex database interactions, or simply need sample data for demonstrations, mastering Faker will significantly boost your productivity and efficiency as a Laravel developer.</p><p><br></p><p>**Key Topics Covered:**</p><p><br></p><p>1. Introduction to Faker: Understanding the purpose and capabilities of the Faker library in Laravel.</p><p>2. Setting Up Your Laravel Environment: Configuring your Laravel application to leverage Faker efficiently.</p><p>3. Generating Basic Fake Data: Creating fake names, emails, addresses, and other common data types.</p><p>4. Customizing Fake Data: Tailoring fake data to suit specific requirements using Faker's flexible API.</p><p>5. Generating Complex Data Structures: Building nested fake data structures, such as relationships between models.</p><p>6. Seeding Your Database: Seeding your Laravel database with fake data using Faker and Laravel's Seeder classes.</p><p>7. Advanced Faker Usage: Exploring advanced techniques and best practices for generating diverse and realistic fake data.</p><p>8. Testing with Faker: Leveraging Faker to write comprehensive unit and integration tests for your Laravel applications.</p><p>9. Integration with Factories and Seeders: Incorporating Faker into Laravel's factory and seeder classes for seamless data population.</p><p>10. Real-world Applications: Applying your newfound skills to practical scenarios, such as e-commerce platforms, social networks, and more.</p><p><br></p><p>**Who Should Take This Course:**</p><p><br></p><p>- Laravel developers looking to enhance their development workflow by automating data generation tasks.</p><p>- Software engineers seeking to improve the efficiency and realism of their testing environments.</p><p>- Students and professionals interested in learning practical techniques for working with fake data in web development.</p><p><br></p><p>**Prerequisites:**</p><p><br></p><p>- Basic understanding of PHP and Laravel framework.</p><p>- Familiarity with database concepts (e.g., MySQL, PostgreSQL).</p><p>- Comfortable working with the command line interface.</p><p><br></p><p>**Course Format:**</p><p><br></p><p>- Duration: X weeks (Y hours per week)</p><p>- Format: Online video lectures, hands-on coding exercises, quizzes, and projects.</p><p>- Instructor: Experienced Laravel developer with expertise in generating fake data.</p><p>- Supplementary Materials: Code samples, documentation references, and additional resources for further learning.</p><p><br></p><p>**By the end of this course, you'll be equipped with the skills and confidence to harness the power of Faker in Laravel, enabling you to accelerate your development process and deliver high-quality applications with ease. Enroll now and take your Laravel skills to the next level!**</p>",
            'project_description' => fake()->paragraph(),
            'duration_seconds' => fake()->numberBetween(3600, 36000),
            'level' => fake()->randomElement(['beginner', 'intermediate', 'advanced', 'all_levels']),
            'status' => fake()->randomElement(['draft', 'pending', 'published', 'rejected']),
        ];
    }

    /**
    * Configure the model factory.
    */
    public function configure(): self
    {
        return $this->afterCreating(function (Course $course) {
            $this->attachTags($course);
            $this->createSections($course);
        });
    }

    /**
     * Attach random tags to the course.
     */
    private function attachTags(Course $course): void
    {
        $tags = Tag::where('category_id', $course->category_id)
            ->where('subcategory_id', $course->subcategory_id)
            ->pluck('id')
            ->shuffle()
            ->take($this->faker->numberBetween(1, 5));

        $course->tags()->attach($tags);
    }

    /**
     * Create sections for the course.
     */
    private function createSections(Course $course): void
    {
        Section::factory()
            ->count($this->faker->numberBetween(3, 8))
            ->has(Lesson::factory()->count(rand(5, 20)))
            ->create(['course_id' => $course->id]);
    }
}
