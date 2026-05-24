<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DemoUserSeeder::class,
        ]);

        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'role' => 'admin',
            ]
        );

        if (User::where('role', 'employee')->count() < 2) {
            User::factory()
                ->count(25)
                ->employee()
                ->has(Employee::factory()->active())
                ->create();
        }
    }
}
