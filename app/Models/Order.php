<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'order_date', 'total_amount', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // วิธีการใช้ with เพื่อดึงข้อมูล order_details พร้อมกับ product ที่เชื่อมโยงกับมัน
    public static function getOrderWithDetails()
    {
        return self::with(['orderDetails.product'])->get();
    }
}