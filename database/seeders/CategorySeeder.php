<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create(["name" => "Creative Arts and Design","status" => true]);
        Category::factory()->create(["name" => "Technology and Programming","status" => true]);
        Category::factory()->create(["name" => "Business and Entrepreneurship","status" => true]);
        Category::factory()->create(["name" => "Personal Development","status" => true]);
        Category::factory()->create(["name" => "Lifestyle and Hobbies","status" => true]);
        Category::factory()->create(["name" => "Language and Communication","status" => true]);
    }
}
