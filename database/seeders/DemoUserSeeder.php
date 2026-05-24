<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@demo.com'],
            [
                'name' => 'Admin User',
                'password' => 'password',
                'role' => 'admin',
            ]
        );

        $employee = User::firstOrCreate(
            ['email' => 'employee@demo.com'],
            [
                'name' => 'Employee User',
                'password' => 'password',
                'role' => 'employee',
            ]
        );

        Employee::firstOrCreate(
            ['user_id' => $employee->id],
            [
                'phone' => '+1 (555) 123-4567',
                'department' => 'Engineering',
                'position' => 'Software Developer',
                'salary' => 75000.00,
                'hire_date' => '2026-01-15',
                'status' => 'active',
            ]
        );
    }
}
