<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'sliders.view', 'group' => 'Slider']);
        Permission::create(['name' => 'sliders.create', 'group' => 'Slider']);
        Permission::create(['name' => 'sliders.edit', 'group' => 'Slider']);
        Permission::create(['name' => 'sliders.delete', 'group' => 'Slider']);

        Permission::create(['name' => 'coupons.view', 'group' => 'Coupon']);
        Permission::create(['name' => 'coupons.create', 'group' => 'Coupon']);
        Permission::create(['name' => 'coupons.edit', 'group' => 'Coupon']);
        Permission::create(['name' => 'coupons.delete', 'group' => 'Coupon']);

        Permission::create(['name' => 'categories.view', 'group' => 'Category']);
        Permission::create(['name' => 'categories.create', 'group' => 'Category']);
        Permission::create(['name' => 'categories.edit', 'group' => 'Category']);
        Permission::create(['name' => 'categories.delete', 'group' => 'Category']);

        Permission::create(['name' => 'subcategories.view', 'group' => 'Subcategory']);
        Permission::create(['name' => 'subcategories.create', 'group' => 'Subcategory']);
        Permission::create(['name' => 'subcategories.edit', 'group' => 'Subcategory']);
        Permission::create(['name' => 'subcategories.delete', 'group' => 'Subcategory']);

        Permission::create(['name' => 'skill-tags.view', 'group' => 'Skill Tag']);
        Permission::create(['name' => 'skill-tags.create', 'group' => 'Skill Tag']);
        Permission::create(['name' => 'skill-tags.edit', 'group' => 'Skill Tag']);
        Permission::create(['name' => 'skill-tags.delete', 'group' => 'Skill Tag']);

        Permission::create(['name' => 'courses.view', 'group' => 'Course']);
        Permission::create(['name' => 'courses.create', 'group' => 'Course']);
        Permission::create(['name' => 'courses.edit', 'group' => 'Course']);
        Permission::create(['name' => 'courses.delete', 'group' => 'Course']);

        Permission::create(['name' => 'learning-paths.view', 'group' => 'Learning Path']);
        Permission::create(['name' => 'learning-paths.create', 'group' => 'Learning Path']);
        Permission::create(['name' => 'learning-paths.edit', 'group' => 'Learning Path']);
        Permission::create(['name' => 'learning-paths.delete', 'group' => 'Learning Path']);

    }
}
