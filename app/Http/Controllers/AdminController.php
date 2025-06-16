<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        
    $userCount = User::where('role', 'user')->count();

    // Total pesanan (opsional: hanya yang berstatus selain 'dibatalkan')
    $orderCount = Order::count();

    // Total pendapatan dari pesanan dengan status 'paid' atau 'completed'
    $totalRevenue = Orderitem::whereIn('status', ['settlement'])->sum('price');

    // Produk terlaris
    $topProduct = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
        ->groupBy('product_id')
        ->orderByDesc('total_sold')
        ->first();

    $topProductName = $topProduct
        ? Product::find($topProduct->product_id)->name
        : '-';

    
        //grafik penjualan bulanan
    $monthlySales = OrderItem::selectRaw('MONTH(created_at) as month, SUM(price) as total')
        ->whereIn('status', ['settlement'])
        ->where('created_at', '>=', now()->subMonths(6))
        ->groupByRaw('MONTH(created_at)')
        ->pluck('total', 'month');

      // data dummy untuk bulan kosong
   $salesData = [
    'labels' => [],
    'data' => [],
];

for ($i = 5; $i >= 0; $i--) {
    $date = Carbon::now()->subMonths($i);
    $month = (int) $date->format('n'); // bulan dalam angka 1–12
    $label = $date->format('M');       // contoh: Jan, Feb, dst

    $salesData['labels'][] = $label;
    $salesData['data'][] = $monthlySales->get($month, 0); // pakai ->get() untuk Collection
}   

    //latest order
    $latestOrders = Order::with('user','items')
    ->orderByDesc('created_at')
    ->take(5)
    ->get();


    //low stock
    $lowStockProducts = Product::where('stock', '<', 5)
    ->orderBy('stock', 'asc')
    ->get();



     
    return view('admin.dashboard', compact('userCount', 'orderCount', 'totalRevenue', 'topProductName','salesData','latestOrders','lowStockProducts'));
    }

    public function index()
    {
         $orders = Order::with('user');
        $orderItems = OrderItem::with('user' ,'product', 'order')->latest()->paginate(10);
        return view('admin.orders', compact('orderItems','orders'));
    }

   

    
}
