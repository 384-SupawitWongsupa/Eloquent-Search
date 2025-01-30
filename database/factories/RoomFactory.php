<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        // สร้างหมายเลขห้องที่ไม่ซ้ำกัน
        do {
            $room_number = $this->faker->numberBetween(100, 999);
        } while (Room::where('room_number', $room_number)->exists()); // ตรวจสอบว่าหมายเลขห้องนี้มีในฐานข้อมูลหรือไม่

        return [
            'room_number' => $room_number,
            'room_type_id' => RoomType::factory(),
            'status' => 'available',
        ];
    }
}