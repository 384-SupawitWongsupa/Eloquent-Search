<?php

namespace Database\Factories;

use App\Models\CustomerHotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerHotelFactory extends Factory
{
    protected $model = CustomerHotel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}