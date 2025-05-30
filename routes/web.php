<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
//use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', [UserProductController::class, 'index'])->name('products.index');
Route::get('/about', fn () => view('users.about'))->name('about');
Route::get('/cart', fn () => view('users.cart'))->name('users.cart');



// Produk - public create form, tapi pastikan otorisasi di controller
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Semua produk hanya bisa diakses user yang login
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::resource('products', ProductController::class);
});


Route::get('/dashboard', function () {
    if ('Auth'::user()->role === 'admin') {
        return view('admin.dashboard');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// User Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
