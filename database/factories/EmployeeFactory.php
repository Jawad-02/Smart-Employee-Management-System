<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'phone' => fake()->phoneNumber(),
            'department' => fake()->randomElement(['Engineering', 'Marketing', 'Sales', 'HR', 'Finance', 'Operations']),
            'position' => fake()->jobTitle(),
            'salary' => fake()->randomFloat(2, 30000, 150000),
            'hire_date' => fake()->date(),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }

    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }
}
