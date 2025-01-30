<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'room_id', 'check_in', 'check_out', 'status']; // แก้ไขคอลัมน์ที่ต้องการให้สามารถใส่ข้อมูลได้

    public function customer()
    {
        return $this->belongsTo(Customer::class); // one to many กับตาราง customer
    }

    public function room()
    {
        return $this->belongsTo(Room::class); // one to many กับตาราง room
    }
}