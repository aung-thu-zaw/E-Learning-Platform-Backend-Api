<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::factory()->create([
            'display_name' => 'Super Admin',
            'role' => 'admin',
            'email' => 'superadmin@gmail.com',
            'password' => 'Password!',
            'status' => 'active',
        ]);

        $superAdmin->assignRole(1);

        $role = Role::with('permissions')->find(1);

        $superAdmin->syncPermissions($role->permissions);

        // Admin
        User::factory()->create([
            'display_name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'Password!',
            'status' => 'active',
        ]);

        // Instructor
        User::factory()->create([
            'display_name' => 'Instructor',
            'role' => 'instructor',
            'email' => 'instructor@gmail.com',
            'password' => 'Password!',
            'status' => 'active',
        ]);

        // Student
        User::factory()->create([
            'display_name' => 'Student',
            'role' => 'student',
            'email' => 'student@gmail.com',
            'password' => 'Password!',
            'status' => 'active',
        ]);

        User::factory(30)->create(['role' => 'admin', 'status' => 'active']);
    }
}
