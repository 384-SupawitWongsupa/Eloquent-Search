<?php

namespace Database\Seeders;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\CustomerHotel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Register;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // สร้างผู้ใช้ 1 รายที่ชื่อ 'Test User' และอีเมล 'test@example.com'
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'newtest@example.com',
        // ]);

    //     // สร้างลูกค้า 10 ราย
    //     Customer::factory(10)->create();

    //     // สร้างสินค้า 10 รายการ
    //     Product::factory(10)->create();

    //     // สร้างคำสั่งซื้อ 10 รายการ
    //     $orders = Order::factory(10)->create();

    // // สร้างรายละเอียดคำสั่งซื้อ (order details) สำหรับแต่ละคำสั่งซื้อ
    // foreach ($orders as $order) {
    //     OrderDetail::factory(30)->create([
    //         'order_id' => $order->id, // เชื่อมโยง order details กับคำสั่งซื้อ
    //         'product_id' => Product::inRandomOrder()->first()->id, // สุ่มสินค้าให้กับ order detail
    //     ]);
    // }
    //  CustomerHotel::factory(10)->create();
    //  RoomType::factory(3)->create();
    //  Room::factory(20)->create();
    //  Booking::factory(30)->create();
     // สร้าง Teachers (อาจารย์) 10 ราย
     Teacher::factory(10)->create();

     // สร้าง Courses (รายวิชา) 5 รายการ โดยมีการเชื่อมโยงกับ Teachers
     Course::factory(5)->create();

     // สร้าง Students (นักศึกษา) 20 ราย
     Student::factory(20)->create();

     // สร้างการลงทะเบียน (Register) สำหรับนักศึกษา 50 รายการ
     Register::factory(50)->create();

    }
}