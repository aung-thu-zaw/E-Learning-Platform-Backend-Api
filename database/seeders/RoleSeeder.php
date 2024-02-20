<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $superAdmin->syncPermissions(Permission::all());

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Support Staff']);
        Role::create(['name' => 'Analytics Manager']);
        Role::create(['name' => 'Content Manager']);
    }
}
