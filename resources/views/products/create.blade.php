@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto mt-8 p-8 bg-white shadow-lg rounded-2xl border border-gray-200 animate-fade-in">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">🧧 Tambah Produk Mahar</h2>

    {{-- Notifikasi --}}
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

    {{-- Form --}}
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        {{-- Nama Produk --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
                placeholder="Contoh: Mahar Siger Palembang" required>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" rows="4"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
                placeholder="Tulis deskripsi singkat produk...">{{ old('description') }}</textarea>
        </div>

        {{-- Harga & Stok --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp) <span class="text-red-500">*</span></label>
                <input type="number" name="price" value="{{ old('price') }}" min="0"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
                    placeholder="Contoh: 250000" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Stok <span class="text-red-500">*</span></label>
                <input type="number" name="stock" value="{{ old('stock') }}" min="0"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
                    placeholder="Contoh: 10" required>
            </div>
        </div>

        {{-- Gambar Produk --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
            <input type="file" name="image" accept="image/*"
                class="block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-md file:border-0
                file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100 transition">
        </div>

        {{-- Tombol Simpan --}}
        <div class="text-right pt-4">
            <button type="submit"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-150">
                💾 Simpan Produk
            </button>
        </div>
    </form>
</div>
@endsection
