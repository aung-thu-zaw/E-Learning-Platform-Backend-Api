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
            'image' => 'https://png.pngtree.com/thumb_back/fh260/background/20220522/pngtree-e-learning-course-banner-online-tutor-image_1375102.jpg',
        ]);

        Slider::factory()->create([
            'title' => 'Master New Skills Anytime, Anywhere',
            'description' => 'Take your learning journey to the next level with our flexible online courses. Learn at your own pace, whenever and wherever you want.',
            'button' => 'Start Learning',
            'status' => true,
            'image' => 'https://png.pngtree.com/thumb_back/fh260/background/20220522/pngtree-digital-and-mobile-learning-image_1375080.jpg',
        ]);

        Slider::factory()->create([
            'title' => 'Stay Ahead in Your Career with Expert-Led Courses',
            'description' => "Stay competitive in today's fast-paced world with our expert-led courses. Gain valuable skills and insights from industry professionals",
            'button' => 'Explore Courses',
            'status' => true,
            'image' => 'https://t3.ftcdn.net/jpg/02/39/39/92/360_F_239399223_tthRTvt26El5ccmyQIck9ySsHKgX5YBo.jpg',
        ]);

        Slider::factory()->create([
            'title' => 'Transform Your Passion into Proficiency',
            'description' => 'Turn your passion into a career advantage with our hands-on courses. Learn from industry experts and turn your dreams into reality.',
            'button' => 'Discover Courses',
            'status' => true,
            'image' => 'https://png.pngtree.com/thumb_back/fh260/background/20220215/pngtree-2-5d-blue-gradient-futuristic-internet-platform-background-image_925281.jpg',

        ]);

        Slider::factory()->create([
            'title' => 'Empower Yourself with Lifelong Learning',
            'description' => 'Embrace the power of lifelong learning with our curated selection of online courses. Expand your horizons and unlock new opportunities.',
            'button' => 'Start Exploring',
            'status' => true,
            'image' => 'https://i.pinimg.com/736x/f2/72/94/f272943e5355a948e9430a8c79e6f1cb.jpg',
        ]);

        Slider::factory()->create([
            'title' => 'Enhance Your Skills with Interactive Learning',
            'description' => 'Experience interactive learning like never before. Dive deep into engaging courses with hands-on projects, quizzes, and interactive content.',
            'button' => 'Get Started Now',
            'status' => true,
            'image' => 'https://png.pngtree.com/thumb_back/fh260/background/20220522/pngtree-education-video-banner-teaching-tool-image_1375074.jpg',
        ]);

        Slider::factory()->create([
            'title' => 'Join a Global Community of Learners',
            'description' => 'Join our vibrant community of learners from around the world. Collaborate, share ideas, and connect with like-minded individuals on your learning journey.',
            'button' => 'Join Community',
            'status' => true,
            'image' => 'https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-internet-technology-blockchain-background-image_192106.jpg',

        ]);
    }
}
