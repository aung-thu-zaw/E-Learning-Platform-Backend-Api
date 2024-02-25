<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::factory()->create([
            "title" => "Unlock Your Potential with Online Courses",
            "description" => "Discover a world of knowledge and skills with our diverse range of online courses. From programming to photography, we have something for everyone.",
            "button" => "Browse Courses",
            "status" => true,
        ]);

        Slider::factory()->create([
            "title" => "Master New Skills Anytime, Anywhere",
            "description" => "Take your learning journey to the next level with our flexible online courses. Learn at your own pace, whenever and wherever you want.",
            "button" => "Start Learning",
            "status" => true,
        ]);

        Slider::factory()->create([
            "title" => "Stay Ahead in Your Career with Expert-Led Courses",
            "description" => "Stay competitive in today's fast-paced world with our expert-led courses. Gain valuable skills and insights from industry professionals",
            "button" => "Explore Courses",
            "status" => true,
        ]);

        Slider::factory()->create([
            "title" => "Transform Your Passion into Proficiency",
            "description" => "Turn your passion into a career advantage with our hands-on courses. Learn from industry experts and turn your dreams into reality.",
            "button" => "Discover Courses",
            "status" => true,
        ]);

        Slider::factory()->create([
            "title" => "Empower Yourself with Lifelong Learning",
            "description" => "Embrace the power of lifelong learning with our curated selection of online courses. Expand your horizons and unlock new opportunities.",
            "button" => "Start Exploring",
            "status" => true,
        ]);

        Slider::factory()->create([
            "title" => "Enhance Your Skills with Interactive Learning",
            "description" => "Experience interactive learning like never before. Dive deep into engaging courses with hands-on projects, quizzes, and interactive content.",
            "button" => "Get Started Now",
            "status" => true,
        ]);

        Slider::factory()->create([
            "title" => "Join a Global Community of Learners",
            "description" => "Join our vibrant community of learners from around the world. Collaborate, share ideas, and connect with like-minded individuals on your learning journey.",
            "button" => "Join Community",
            "status" => true,
        ]);
    }
}
