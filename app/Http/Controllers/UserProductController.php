<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('users.katalog', compact('products'));
    }
}
