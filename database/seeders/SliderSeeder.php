<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::factory()->create([
            'title' => 'Unlock Your Potential with Online Courses',
            'description' => 'Discover a world of knowledge and skills with our diverse range of online courses. From programming to photography, we have something for everyone.',
            'button' => 'Browse Courses',
            'status' => true,
            'image' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGUlMjBsZWFybmluZ3xlbnwwfHwwfHx8MA%3D%3D',
        ]);

        Slider::factory()->create([
            'title' => 'Master New Skills Anytime, Anywhere',
            'description' => 'Take your learning journey to the next level with our flexible online courses. Learn at your own pace, whenever and wherever you want.',
            'button' => 'Start Learning',
            'status' => true,
            'image' => 'https://images.unsplash.com/photo-1610484826967-09c5720778c7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZSUyMGxlYXJuaW5nfGVufDB8fDB8fHww',
        ]);

        Slider::factory()->create([
            'title' => 'Stay Ahead in Your Career with Expert-Led Courses',
            'description' => "Stay competitive in today's fast-paced world with our expert-led courses. Gain valuable skills and insights from industry professionals",
            'button' => 'Explore Courses',
            'status' => true,
            'image' => 'https://images.unsplash.com/photo-1500160503851-c04cefe545a9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzh8fGUlMjBsZWFybmluZ3xlbnwwfHwwfHx8MA%3D%3D',
        ]);

        Slider::factory()->create([
            'title' => 'Transform Your Passion into Proficiency',
            'description' => 'Turn your passion into a career advantage with our hands-on courses. Learn from industry experts and turn your dreams into reality.',
            'button' => 'Discover Courses',
            'status' => true,
            'image' => 'https://images.unsplash.com/photo-1513258496099-48168024aec0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZSUyMGxlYXJuaW5nfGVufDB8fDB8fHww',

        ]);

        Slider::factory()->create([
            'title' => 'Empower Yourself with Lifelong Learning',
            'description' => 'Embrace the power of lifelong learning with our curated selection of online courses. Expand your horizons and unlock new opportunities.',
            'button' => 'Start Exploring',
            'status' => true,
            'image' => 'https://images.unsplash.com/photo-1417733403748-83bbc7c05140?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fGUlMjBsZWFybmluZ3xlbnwwfHwwfHx8MA%3D%3D',
        ]);

        Slider::factory()->create([
            'title' => 'Enhance Your Skills with Interactive Learning',
            'description' => 'Experience interactive learning like never before. Dive deep into engaging courses with hands-on projects, quizzes, and interactive content.',
            'button' => 'Get Started Now',
            'status' => true,
            'image' => 'https://images.unsplash.com/photo-1584697964156-deca98e4439d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTh8fGUlMjBsZWFybmluZ3xlbnwwfHwwfHx8MA%3D%3D',
        ]);

        Slider::factory()->create([
            'title' => 'Join a Global Community of Learners',
            'description' => 'Join our vibrant community of learners from around the world. Collaborate, share ideas, and connect with like-minded individuals on your learning journey.',
            'button' => 'Join Community',
            'status' => true,
            'image' => 'https://images.unsplash.com/photo-1565598571120-4081876df4f7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTAwfHxlJTIwbGVhcm5pbmd8ZW58MHx8MHx8fDA%3D',

        ]);
    }
}
