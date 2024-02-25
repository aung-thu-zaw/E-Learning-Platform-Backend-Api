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




        // Permission::create(['name' => 'categories.view', 'group' => 'Category']);
        // Permission::create(['name' => 'categories.create', 'group' => 'Category']);
        // Permission::create(['name' => 'categories.edit', 'group' => 'Category']);
        // Permission::create(['name' => 'categories.delete', 'group' => 'Category']);

        // Permission::create(['name' => 'subcategories.view', 'group' => 'Subcategory']);
        // Permission::create(['name' => 'subcategories.create', 'group' => 'Subcategory']);
        // Permission::create(['name' => 'subcategories.edit', 'group' => 'Subcategory']);
        // Permission::create(['name' => 'subcategories.delete', 'group' => 'Subcategory']);

        // Permission::create(['name' => 'skill-tags.view', 'group' => 'Skill Tag']);
        // Permission::create(['name' => 'skill-tags.create', 'group' => 'Skill Tag']);
        // Permission::create(['name' => 'skill-tags.edit', 'group' => 'Skill Tag']);
        // Permission::create(['name' => 'skill-tags.delete', 'group' => 'Skill Tag']);

        // Permission::create(['name' => 'courses.view', 'group' => 'Course']);
        // Permission::create(['name' => 'courses.create', 'group' => 'Course']);
        // Permission::create(['name' => 'courses.edit', 'group' => 'Course']);
        // Permission::create(['name' => 'courses.delete', 'group' => 'Course']);

        // Permission::create(['name' => 'learning-paths.view', 'group' => 'Learning Path']);
        // Permission::create(['name' => 'learning-paths.create', 'group' => 'Learning Path']);
        // Permission::create(['name' => 'learning-paths.edit', 'group' => 'Learning Path']);
        // Permission::create(['name' => 'learning-paths.delete', 'group' => 'Learning Path']);

        // ********** Sliders **********
        Permission::create(['name' => 'sliders.view', 'group' => 'Slider']);
        Permission::create(['name' => 'sliders.create', 'group' => 'Slider']);
        Permission::create(['name' => 'sliders.edit', 'group' => 'Slider']);
        Permission::create(['name' => 'sliders.delete', 'group' => 'Slider']);

        // ********** Coupons **********
        // Permission::create(['name' => 'coupons.view', 'group' => 'Coupon']);
        // Permission::create(['name' => 'coupons.create', 'group' => 'Coupon']);
        // Permission::create(['name' => 'coupons.edit', 'group' => 'Coupon']);
        // Permission::create(['name' => 'coupons.delete', 'group' => 'Coupon']);

        // ********** Catalogues **********
        Permission::create(['name' => 'categories.view', 'group' => 'Catalogues']);
        Permission::create(['name' => 'categories.create', 'group' => 'Catalogues']);
        Permission::create(['name' => 'categories.edit', 'group' => 'Catalogues']);
        Permission::create(['name' => 'categories.delete', 'group' => 'Catalogues']);

        Permission::create(['name' => 'subcategories.view', 'group' => 'Catalogues']);
        Permission::create(['name' => 'subcategories.create', 'group' => 'Catalogues']);
        Permission::create(['name' => 'subcategories.edit', 'group' => 'Catalogues']);
        Permission::create(['name' => 'subcategories.delete', 'group' => 'Catalogues']);

        // ********** Skill Tag **********
        Permission::create(['name' => 'tags.view', 'group' => 'Skill Tag']);
        Permission::create(['name' => 'tags.create', 'group' => 'Skill Tag']);
        Permission::create(['name' => 'tags.edit', 'group' => 'Skill Tag']);
        Permission::create(['name' => 'tags.delete', 'group' => 'Skill Tag']);

        // ********** Newsletter **********
        Permission::create(['name' => 'subscribers.view', 'group' => 'Newsletter']);
        Permission::create(['name' => 'subscribers.delete', 'group' => 'Newsletter']);
        Permission::create(['name' => 'newsletter.send', 'group' => 'Newsletter']);

        // ********** Manage Blog **********
        Permission::create(['name' => 'blog-categories.view', 'group' => 'Blog Category']);
        Permission::create(['name' => 'blog-categories.create', 'group' => 'Blog Category']);
        Permission::create(['name' => 'blog-categories.edit', 'group' => 'Blog Category']);
        Permission::create(['name' => 'blog-categories.delete', 'group' => 'Blog Category']);

        Permission::create(['name' => 'blog-contents.view', 'group' => 'Blog Content']);
        Permission::create(['name' => 'blog-contents.create', 'group' => 'Blog Content']);
        Permission::create(['name' => 'blog-contents.edit', 'group' => 'Blog Content']);
        Permission::create(['name' => 'blog-contents.delete', 'group' => 'Blog Content']);

    }
}
