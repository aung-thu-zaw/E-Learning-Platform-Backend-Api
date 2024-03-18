<?php

namespace Database\Seeders;

use App\Models\EmailNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmailNotification::factory()->create([
            'name' => "Updates From Courses You're Taking",
            'description' => "Announcements, events, and tips and tricks."
        ]);

        EmailNotification::factory()->create([
            'name' => "Updates from Instructor Discussions",
            'description' => "Public Discussions outside of a course that teachers share to all of their followers."
        ]);

        EmailNotification::factory()->create([
            'name' => "Activity on Your Projects",
            'description' => "Someone likes or comments on a project you've created."
        ]);

        EmailNotification::factory()->create([
            'name' => "Activity on Your Discussions and Comments",
            'description' => "Someone replies to a comment or discussion you've created."
        ]);

        EmailNotification::factory()->create([
            'name' => "Replies to Comments",
            'description' => "Someone replies to a comment that you previously replied to."
        ]);

        EmailNotification::factory()->create([
            'name' => "New Follower",
            'description' => "Someone on platform follows you."
        ]);

        EmailNotification::factory()->create([
            'name' => "New Course by Someone You Follow",
            'description' => "Someone you follow creates a Course."
        ]);

        EmailNotification::factory()->create([
            'name' => "Personalized Course Recommendations",
            'description' => "Weekly recommendations tailored to your interests."
        ]);

        EmailNotification::factory()->create([
            'name' => "New Launches and Content",
            'description' => "Learn about new courses, launches, and more on platform."
        ]);

        EmailNotification::factory()->create([
            'name' => "Updates from platform",
            'description' => "Occasional product and company announcements."
        ]);

        EmailNotification::factory()->create([
            'name' => "Promotions and Discounts",
            'description' => "Stay in the loop on how to get discounts on platform membership and more."
        ]);

        EmailNotification::factory()->create([
            'name' => "Don't Send Me Any Email",
            'description' => "You will only receive critical account emails."
        ]);
    }
}
