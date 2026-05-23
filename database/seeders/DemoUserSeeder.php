<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        $employee = User::factory()->create([
            'name' => 'Employee User',
            'email' => 'employee@demo.com',
            'password' => 'password',
            'role' => 'employee',
        ]);

        Employee::factory()->create([
            'user_id' => $employee->id,
            'phone' => '+1 (555) 123-4567',
            'department' => 'Engineering',
            'position' => 'Software Developer',
            'salary' => 75000.00,
            'hire_date' => '2026-01-15',
            'status' => 'active',
        ]);
    }
}
