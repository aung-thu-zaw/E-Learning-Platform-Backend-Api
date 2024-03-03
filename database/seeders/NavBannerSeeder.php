<?php

namespace Database\Seeders;

use App\Models\NavBanner;
use Illuminate\Database\Seeder;

class NavBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NavBanner::factory()->create([
            'description' => 'Unlock unlimited learning opportunities! Explore a wide range of courses and tutorials on our platform.',
            'button' => 'Get Started',
            'countdown' => '2024-03-10 10:00:00',
            'start_date_time' => '2024-02-25 10:00:00',
            'end_date_time' => '2024-03-25 10:00:00',
            'is_active' => false,
        ]);

        NavBanner::factory()->create([
            'description' => 'Learn from industry experts and top instructors. Upgrade your skills today!',
            'button' => 'Browse Courses',
            'countdown' => '2024-03-15 10:00:00',
            'start_date_time' => '2024-02-26 10:00:00',
            'end_date_time' => '2024-03-26 10:00:00',
            'is_active' => false,
        ]);

        NavBanner::factory()->create([
            'description' => 'Discover new passions and interests. Start your learning journey now!',
            'button' => 'Explore Topics',
            'countdown' => '2024-03-20 10:00:00',
            'start_date_time' => '2024-02-27 10:00:00',
            'end_date_time' => '2024-03-27 10:00:00',
            'is_active' => false,
        ]);

        NavBanner::factory()->create([
            'description' => 'Join our community of learners. Access quality education anytime, anywhere.',
            'button' => 'Join Now',
            'countdown' => null,
            'start_date_time' => '2024-02-28 10:00:00',
            'end_date_time' => '2024-03-28 10:00:00',
            'is_active' => false,
        ]);

        NavBanner::factory()->create([
            'description' => 'Upgrade your skills with our library of courses. Start learning today!',
            'button' => 'Start Learning',
            'countdown' => null,
            'start_date_time' => '2024-02-29 10:00:00',
            'end_date_time' => '2024-03-29 10:00:00',
            'is_active' => false,
        ]);

        NavBanner::factory()->create([
            'description' => 'Enhance your knowledge with our diverse collection of tutorials and resources.',
            'button' => 'Discover More',
            'countdown' => null,
            'start_date_time' => '2024-03-01 10:00:00',
            'end_date_time' => '2024-03-30 10:00:00',
            'is_active' => false,
        ]);

        NavBanner::factory()->create([
            'description' => 'Invest in yourself. Learn new skills, advance your career!',
            'button' => 'Invest Now',
            'countdown' => null,
            'start_date_time' => '2024-03-02 10:00:00',
            'end_date_time' => '2024-03-31 10:00:00',
            'is_active' => false,
        ]);

        NavBanner::factory()->create([
            'description' => 'Unlock your potential. Access thousands of courses on-demand.',
            'button' => 'Unlock Now',
            'countdown' => null,
            'start_date_time' => '2024-03-03 10:00:00',
            'end_date_time' => '2024-04-01 10:00:00',
            'is_active' => false,
        ]);

        NavBanner::factory()->create([
            'description' => 'Empower yourself with knowledge. Start your learning journey with us!',
            'button' => 'Empower Now',
            'countdown' => null,
            'start_date_time' => '2024-03-04 10:00:00',
            'end_date_time' => '2024-04-02 10:00:00',
            'is_active' => false,
        ]);

        NavBanner::factory()->create([
            'description' => 'Achieve your goals. Learn from the best. Get started today!',
            'button' => 'Achieve Now',
            'countdown' => null,
            'start_date_time' => '2024-03-05 10:00:00',
            'end_date_time' => '2024-04-03 10:00:00',
            'is_active' => false,
        ]);
    }
}
