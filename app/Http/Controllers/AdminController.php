<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Mengambil statistik untuk dashboard
        $totalUsers = User::count(); // Total pengguna terdaftar
        $activeUsers = User::where('last_login', '>', now()->subDays(30))->count(); // Pengguna aktif dalam 30 hari terakhir
        $totalOrdersToday = Order::whereDate('created_at', today())->count(); // Pesanan hari ini
        $totalRevenueToday = Order::whereDate('created_at', today())->sum('total_amount'); // Pendapatan hari ini
        $totalProducts = Product::count(); // Jumlah produk yang tersedia

        // Kirim data ke view dashboard
        return view('admin.dashboard', compact(
            'totalUsers',
            'activeUsers',
            'totalOrdersToday',
            'totalRevenueToday',
            'totalProducts'
        ));
    }

    public function index()
    {
        $orderItems = OrderItem::with('user')->latest()->paginate(10);
        return view('admin.orders', compact('orderItems'));
    }
}
