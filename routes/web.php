<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('users.cart');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


Route::get('/order-success', [OrderController::class, 'success'])->name('users.order-success');
Route::get('/check-payment/{orderId}', [OrderController::class, 'checkPaymentStatus']);

Route::middleware('auth')->group(function() {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/process', [OrderController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/orders/success', [OrderController::class, 'success'])->name('users.payment');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', [UserProductController::class, 'index'])->name('products.index');
Route::get('/about', fn () => view('users.about'))->name('about');
//Route::get('/cart', fn () => view('users.cart'))->name('users.cart');

Route::get('/katalog', [UserProductController::class, 'index'])->name('users.katalog');
Route::get('/katalog/{slug}', [UserProductController::class, 'show'])->name('users.produk.show');



// Produk - public create form, tapi pastikan otorisasi di controller
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Semua produk hanya bisa diakses user yang login
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::resource('products', ProductController::class);
});

Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return view('admin.dashboard'); // jika admin, arahkan ke dashboard admin
    }

    $products = Product::latest()->take(4)->get(); // ambil 4 produk terbaru untuk user
    return view('dashboard', compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard');



// User Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [AdminController::class, 'index'])->name('admin.orders');
    Route::post('/orders/refresh', [OrderController::class, 'updateorder'])->name('admin.orders.refresh');
});





require __DIR__.'/auth.php';
