<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Cart, Order, OrderItem, Product};
use Illuminate\Support\Facades\{Auth, DB};
use Midtrans\{Config, Snap, Transaction};

class OrderController extends Controller
{
    public $snapToken;

    public function checkout()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('users.cart')->with('error', 'Keranjang Anda kosong!');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('users.checkout', compact('cartItems', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('users.cart')->with('error', 'Keranjang Anda kosong!');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $user->id,
                'address' => $request->address,
                'total_price' => $total,
                'status' => 'pending',
            ]);

            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $order_id = $order->id . '-' . uniqid();

            $params = [
                'transaction_details' => [
                    'order_id' => $order_id,
                    'gross_amount' => $order->total_price,
                ],
                'customer_details' => [
                    'first_name' => $user->name,
                    'email' => $user->email,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);
            $this->snapToken = $snapToken;

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order_id,
                    'user_id' => $user->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'status' => 'pending'
                ]);
            }

            Cart::where('user_id', $user->id)->delete();

            DB::commit();

            return view('users.payment', compact('snapToken', 'order'));

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('checkout')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function checkPaymentStatus($orderId)
    {
        try {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $status = Transaction::status($orderId);
            return $status->transaction_status;

        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal cek status pembayaran'], 500);
        }
    }

    public function updateOrder()
    {
        $orderItems = OrderItem::all();

        foreach ($orderItems as $item) {
            $newStatus = $this->checkPaymentStatus($item->order_id);

            if ($item->status !== $newStatus) {
                $item->status = $newStatus;
                $item->save();

                // Update stok jika berhasil
                if ($newStatus === 'settlement') {
                    $product = Product::find($item->product_id);
                    if ($product && $product->stock >= $item->quantity) {
                        $product->stock -= $item->quantity;
                        $product->save();
                    }
                }
            }
        }

        $this->updateStatus();
        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }

    public function updateStatus()
    {
        $orderItems = OrderItem::all();
        $orders = Order::all();

        foreach ($orderItems as $item) {
            $id = explode('-', $item->order_id)[0];
            $order = $orders->where('id', $id)->first();

            if ($order) {
                $order->status = $item->status;
                $order->save();
            }
        }
    }

    public function success()
    {
        return view('users.order-success', ['snapToken' => $this->snapToken]);
    }

    public function myOrders()
    {
        $orderItems = OrderItem::whereHas('order', function ($query) {
            $query->where('user_id', auth()->id());
        })->with(['product', 'order'])->latest()->paginate(10);

        return view('users.cekpesanan', compact('orderItems'));
    }

    public function cancel($itemId)
    {
        $item = OrderItem::whereHas('order', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($itemId);

        if ($item->status === 'cancel') {
            return redirect()->back()->with('error', 'Item sudah dibatalkan.');
        }

        $item->status = 'cancel';
        $item->save();

        return redirect()->back()->with('success', 'Item pesanan berhasil dibatalkan.');
    }
}
