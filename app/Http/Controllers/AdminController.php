<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    } 

    public function index()
    {
        $orderItems = OrderItem::with('user')->latest()->paginate(10);
        return view('admin.orders', compact('orderItems'));
    }

    
}
