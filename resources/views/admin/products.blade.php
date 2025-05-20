@extends('layouts.admin')

@section('title', 'Produk')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Dashboard</h1>
        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::now()->format('m / d / Y') }}</span>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">📦 Product Catalog</h2>
        <p class="text-sm text-gray-500">Kelola produk kamu di sini</p>
    </div>

    <!-- Search & Add Product -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-4">
        <input type="text" placeholder="🔍 Cari produk..." 
               class="w-full sm:w-1/2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-400 focus:outline-none transition" />
        <a href="{{ route('products.create') }}"
           class="inline-block bg-purple-600 text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-purple-700 transition shadow">
            + Tambah Produk
        </a>
    </div>

    <!-- Product Table -->
    <div class="bg-white rounded-xl shadow-md p-6 overflow-x-auto">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">📝 Daftar Produk</h3>

        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Produk</th>
                    <th class="px-4 py-3 text-left font-semibold">Harga</th>
                    <th class="px-4 py-3 text-left font-semibold">Stok</th>
                    <th class="px-4 py-3 text-left font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($products as $product)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-4 flex items-center gap-4">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-14 h-14 object-cover rounded-md border" />
                        <span class="font-medium text-gray-800">{{ $product->name }}</span>
                    </td>
                    <td class="px-4 py-4 text-gray-700">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-4 py-4 text-sm text-green-600 font-medium">
                        In stock ({{ $product->stock }})
                    </td>
                    <td class="px-4 py-4 flex gap-2 text-lg">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700 transition" title="Edit">
                            ✏️
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition" title="Hapus">
                                🗑️
                            </button>
                        </form>
                        <button class="text-gray-500 hover:text-gray-700 transition" title="Lainnya">⋮</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">Belum ada produk tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-end">
        {{ $products->links() }}
    </div>

    <div class="text-center text-gray-400 mt-8 text-sm font-semibold">
        Mahar Seserahan Jambi © {{ date('Y') }}
    </div>
@endsection
