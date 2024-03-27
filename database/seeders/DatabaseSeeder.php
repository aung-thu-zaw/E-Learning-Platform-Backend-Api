<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EmailNotificationSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            NavBannerSeeder::class,
            SliderSeeder::class,
            CouponSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            TagSeeder::class,
            CourseSeeder::class,
            CourseMetricSeeder::class,
            // SectionSeeder::class,
            EnrollmentSeeder::class,
            LearningPathSeeder::class,
            NewsletterSubscriberSeeder::class,
            BlogCategorySeeder::class,
            BlogContentSeeder::class,
        ]);
    }
}
