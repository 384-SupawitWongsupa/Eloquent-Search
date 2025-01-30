<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Customer::class;
    public function definition(): array
    {
        
        return  [
            'name' => $this->faker->name, // ใช้ $this->faker แทน $faker
            'email' => $this->faker->unique()->safeEmail, // ใช้ $this->faker แทน $faker
            'address' => $this->faker->address, // ใช้ $this->faker แทน $faker
        ];
    }
}