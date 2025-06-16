<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function show($id)
    {
         $order = Order::with('user')->findOrFail($id);

    return response()->json([
        'name' => $order->user->name,
        'email' => $order->user->email,
        'address' => $order->address,
        'status' => $order->status,
        'total_price' => $order->total_price,
        'created_at' => $order->created_at->format('d-m-Y H:i'),
    ]);
    }
}

