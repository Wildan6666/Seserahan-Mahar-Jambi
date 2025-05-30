@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="max-w-4xl mx-auto mt-8 p-8 bg-white shadow-lg rounded-2xl border border-gray-200">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">✏️ Edit Produk</h2>

    @if(session('success'))
        <div class="bg-green-50 text-green-700 border border-green-300 p-4 rounded mb-6 text-sm shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-50 text-red-700 border border-red-300 p-4 rounded mb-6 text-sm shadow-sm">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
            <input type="file" name="image" class="block w-full text-sm text-gray-500">
            @if ($product->image)
                <img src="{{ asset('images/products/' . $product->image) }}" class="w-24 mt-2 border rounded" alt="{{ $product->name }}">
            @endif
        </div>

        <div class="text-right pt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                💾 Update Produk
            </button>
        </div>
    </form>
</div>
@endsection
