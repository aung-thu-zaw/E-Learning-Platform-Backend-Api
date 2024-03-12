<?php

namespace Database\Seeders;

use App\Models\CourseMetric;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseMetricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseMetric::factory(20)->create();
    }
}
