<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;

use Inertia\Inertia;

class SystemOrderController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลจาก Order พร้อมข้อมูลลูกค้า (Customer) และ OrderDetail พร้อม Product
        $orders = Order::with(['customer', 'orderDetails.product'])->get();

        // ส่งข้อมูลไปยังหน้า React
        
        // ส่งข้อมูลไปยังหน้า React
        return Inertia::render('Shop/Index', [
            'orders' => $orders
        ]);
    }
}