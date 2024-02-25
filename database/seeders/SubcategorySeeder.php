<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creative Arts and Design
        Subcategory::factory()->create(['category_id' => 1, 'name' => 'Graphic Design', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 1, 'name' => 'Illustration', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 1, 'name' => 'Photography', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 1, 'name' => 'Digital Art', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 1, 'name' => 'UI/UX Design', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 1, 'name' => 'Fashion Design', 'status' => true]);

        // Technology and Programming","status
        Subcategory::factory()->create(['category_id' => 2, 'name' => 'Web Development', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 2, 'name' => 'Mobile App Development', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 2, 'name' => 'Data Science', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 2, 'name' => 'Machine Learning and AI', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 2, 'name' => 'Cybersecurity', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 2, 'name' => 'Blockchain Technology', 'status' => true]);

        // Business and Entrepreneurship","status
        Subcategory::factory()->create(['category_id' => 3, 'name' => 'Startup Fundamentals', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 3, 'name' => 'Business Strategy', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 3, 'name' => 'Marketing and Branding', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 3, 'name' => 'Finance and Accounting', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 3, 'name' => 'Project Management', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 3, 'name' => 'E-commerce', 'status' => true]);

        // Personal Development
        Subcategory::factory()->create(['category_id' => 4, 'name' => 'Goal Setting and Productivity', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 4, 'name' => 'Time Management', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 4, 'name' => 'Mindfulness and Meditation', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 4, 'name' => 'Leadership Skills', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 4, 'name' => 'Career Development', 'status' => true]);

        // Lifestyle and Hobbies
        Subcategory::factory()->create(['category_id' => 5, 'name' => 'Cooking and Baking', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 5, 'name' => 'Fitness and Nutrition', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 5, 'name' => 'Yoga and Meditation', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 5, 'name' => 'DIY and Crafts', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 5, 'name' => 'Music and Instruments', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 5, 'name' => 'Gardening and Plant Care', 'status' => true]);

        // Language and Communication
        Subcategory::factory()->create(['category_id' => 6, 'name' => ' English as a Second Language (ESL)', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 6, 'name' => 'Foreign Languages', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 6, 'name' => 'Writing and Grammar', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 6, 'name' => 'Communication Skills', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 6, 'name' => 'Public Speaking', 'status' => true]);
        Subcategory::factory()->create(['category_id' => 6, 'name' => 'Storytelling Techniques', 'status' => true]);
    }
}
