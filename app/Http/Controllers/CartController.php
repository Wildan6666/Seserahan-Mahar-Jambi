<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $cartItems = Cart::with('product')
                     ->where('user_id', $user->id)
                     ->get();

    return view('users.cart', ['cart' => $cartItems]);
}


    public function add(Request $request, $id)
{
    $user = Auth::user();
    $quantity = $request->input('quantity', 1);

    $cartItem = Cart::where('user_id', $user->id)
                    ->where('product_id', $id)
                    ->first();

    if ($cartItem) {
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $id,
            'quantity' => $quantity,
        ]);
    }

    return redirect()->route('users.cart')->with('success', 'Produk ditambahkan ke keranjang.');
}

    public function remove($id)
{
    $user = Auth::user();
    Cart::where('user_id', $user->id)
        ->where('product_id', $id)
        ->delete();

    return back()->with('success', 'Produk dihapus dari keranjang.');
}

}
