@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto mt-8 p-8 bg-white shadow-xl rounded-2xl">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-2">Tambah Produk Mahar</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 border border-red-300 p-4 rounded mb-6">
            <ul class="list-disc pl-5 space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Nama Produk -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Nama Produk <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description') }}</textarea>
        </div>

        <!-- Harga dan Stok -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Harga -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Harga (Rp) <span class="text-red-500">*</span></label>
                <input type="number" name="price" value="{{ old('price') }}" min="0" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <!-- Stok -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Stok <span class="text-red-500">*</span></label>
                <input type="number" name="stock" value="{{ old('stock') }}" min="0" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
        </div>

        <!-- Gambar -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Gambar Produk</label>
            <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100">
        </div>

        <!-- Tombol -->
        <div class="text-right pt-4">
            <button type="submit" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow">
                Simpan Produk
            </button>
        </div>
    </form>
</div>
@endsection
