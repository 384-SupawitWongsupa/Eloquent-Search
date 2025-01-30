<?php
namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    // กำหนดค่า $model ให้ตรงกับ Order
    protected $model = Order::class;

    public function definition(): array
    {
        
        return [
            'customer_id' => Customer::factory(), // เชื่อมโยงกับ CustomerFactory
            'total_amount' => $this->faker->randomFloat(2, 50, 500), // สุ่มยอดรวมของคำสั่งซื้อ
            'order_date' => $this->faker->dateTimeThisYear(), // สุ่มวันที่ของคำสั่งซื้อ
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']), // สุ่มสถานะคำสั่งซื้อ
        ];
    }
}