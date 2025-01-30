<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    protected $model = OrderDetail::class;

    public function definition()
    {

        return [
            'order_id' => Order::factory(), // ใช้ factory ของ Order
            'product_id' => Product::inRandomOrder()->first()->id, // สุ่มสินค้า
            'quantity' => $this->faker->numberBetween(1, 5), // จำนวน
            'price' => $this->faker->randomFloat(2, 10, 100), // ราคา
        ];
    }
}