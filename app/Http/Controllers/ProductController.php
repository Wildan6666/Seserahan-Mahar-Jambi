<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function index()
    
{
    $products = Product::latest()->paginate(10);
    return view('admin.products', compact('products'));
}
public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));

}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $product = Product::findOrFail($id);

    // Update image jika ada
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/products'), $filename);
        
        // Hapus gambar lama
        if ($product->image && file_exists(public_path('images/products/' . $product->image))) {
            unlink(public_path('images/products/' . $product->image));
        }

        $product->image = $filename;
    }

    // Update data lainnya
    $product->name = $request->name;
    $product->price = $request->price;
    $product->stock = $request->stock;
     $product->description = $request->description;
    $product->save();

    return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);

    // Hapus gambar dari storage jika ada
    if ($product->image && file_exists(public_path('images/products/' . $product->image))) {
        unlink(public_path('images/products/' . $product->image));
    }

    $product->delete();

    return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
}



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/products'), $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('products.create')->with('success', 'Produk berhasil ditambahkan!');
    }


 public function ajaxSearch(Request $request)
{
    $query = $request->get('query');

    $products = Product::where('name', 'like', '%' . $query . '%')->get();

    return response()->json($products);
}


    
}
