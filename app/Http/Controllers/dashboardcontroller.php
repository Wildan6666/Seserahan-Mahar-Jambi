<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    if (Auth::user()->role === 'admin') {
        return view('admin.dashboard');
    }

    $products = Product::latest()->take(4)->get();
    return view('dashboard', compact('products'));
}
}

