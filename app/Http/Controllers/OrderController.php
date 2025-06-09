<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

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

        // Hitung total harga
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

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
    

    // Hitung total harga
    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item->product->price * $item->quantity;
    }

    $test = DB::beginTransaction();
    //dd($test);

    try {
        $order = Order::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'total_price' => $total,
            'status' => 'pending',
        ]);

          // Setup Midtrans config
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $order->id . '-' . uniqid(),
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        $this->snapToken = $snapToken;
     
        Cart::where('user_id', $user->id)->delete();

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $params['transaction_details']['order_id'],
                'user_id' => Auth::user()->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
            }

        DB::commit();
      
        return view('users.payment', compact('snapToken', 'order'));

    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->route('checkout')->with('error', "Terjadi kesalahan saat memproses pesanan: " . $e->getMessage());
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

       return $status->transaction_status; // Kembalikan langsung string status
    } catch (\Exception $e) {
        //dd($e);
        return response()->json(['error' => 'Gagal cek status pembayaran'], 500);
        
    }
}

// bikin tombol "Refresh Status" yang eksekusi ini
public function updateOrder()
{
    $order_items = OrderItem::all();

    foreach ($order_items as $order) {
        $newStatus = $this->checkPaymentStatus($order->order_id);
        $order->status = $newStatus;
        $order->save(); // Jangan lupa simpan perubahannya!
    }

    return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
}
    // Tambahkan halaman success
    public function success()
    {
        $snapToken = $this->snapToken; 
        return view('users.order-success', compact('snapToken'));
    }
}
