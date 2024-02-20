<?php

namespace Database\Seeders;

use App\Models\BlogContent;
use Illuminate\Database\Seeder;

class BlogContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogContent::factory()->count(5)->create();
    }
}
