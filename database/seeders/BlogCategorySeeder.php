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
        BlogCategory::factory()->create(["name" => "Tech Tips","status" => true]);
        BlogCategory::factory()->create(["name" => "Study Hacks","status" => true]);
        BlogCategory::factory()->create(["name" => "Subject Spotlights","status" => true]);
        BlogCategory::factory()->create(["name" => "Career Boosters","status" => true]);
        BlogCategory::factory()->create(["name" => "Success Stories","status" => true]);
    }
}
