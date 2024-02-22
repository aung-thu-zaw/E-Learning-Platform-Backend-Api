<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogCategory::factory()->create([
            "name" => "Tech Tips",
            "description" => "Explore the world of educational technology with articles that delve into the latest advancements, tools, and strategies shaping modern education. Discover how e-learning platforms, learning management systems, virtual classrooms, and innovative digital tools are revolutionizing teaching and learning processes.",
            "status" => true
        ]);
        BlogCategory::factory()->create([
            "name" => "Study Hacks",
            "description" => "Unlock the secrets to academic success with practical advice, proven study techniques, and effective learning strategies. From time management tips to memory improvement techniques, this category offers valuable insights to help students maximize their learning potential and achieve their academic goals.",
            "status" => true
        ]);
        BlogCategory::factory()->create([
            "name" => "Subject Spotlights",
            "description" => "Dive deep into specific subjects and disciplines with comprehensive resources, study guides, and educational content tailored to various academic fields. Whether you're passionate about mathematics, science, literature, history, languages, or computer science, this category provides valuable resources to enhance your understanding and mastery of key concepts.",
            "status" => true
        ]);
        BlogCategory::factory()->create([
            "name" => "Career Boosters",
            "description" => "Take your career to new heights with articles focused on professional development, career growth, and skill enhancement. Explore opportunities for continuous learning, career advancement, and personal growth through online courses, certifications, workshops, and professional development programs designed to boost your skills and expand your horizons.",
            "status" => true
        ]);
        BlogCategory::factory()->create([
            "name" => "Success Stories",
            "description" => "Be inspired by the stories of students, educators, and professionals who have achieved remarkable success through online learning. From overcoming obstacles and achieving academic excellence to pursuing lifelong learning and making significant contributions in their fields, these stories showcase the transformative power of education and the impact it can have on individuals and communities.",
            "status" => true
        ]);
    }
}
