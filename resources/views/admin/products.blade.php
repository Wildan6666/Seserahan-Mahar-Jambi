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
           class="px-6 py-2 border-dashed border-2 border-purple-400 text-purple-600 rounded-full hover:bg-purple-50 transition text-sm font-semibold">
            + ADD PRODUCT
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
                            <img src="{{ asset('images/products/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-16 h-16 object-cover rounded-md border" />
                            <span class="font-medium text-gray-800">{{ $product->name }}</span>
                        </td>
                        <td class="px-4 py-4 text-gray-700">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-4 text-sm text-green-600 font-medium">
                            In stock ({{ $product->stock }})
                        </td>
                        <td class="px-4 py-4 flex items-center gap-4 text-lg">
                            <!-- Edit Button -->
                            <a href="{{ route('products.edit', $product->id) }}"
                               class="text-gray-600 hover:text-gray-800 transition"
                               title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M17.414 2.586a2 2 0 010 2.828L7.828 13H5v-2l9.586-9.586a2 2 0 012.828 0z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-gray-600 hover:text-gray-800 transition"
                                        title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a2 2 0 012-2h4a2 2 0 012 2h6a2 2 0 012 2v14a2 2 0 01-2 2H4a2 2 0 01-2-2V4a2 2 0 012-2h6z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>

                            <!-- More Button -->
                            <button class="text-gray-600 hover:text-gray-800 transition" title="Lainnya">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M2 10a2 2 0 114 0 2 2 0 01-4 0zm6 0a2 2 0 114 0 2 2 0 01-4 0zm6 0a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                            Belum ada produk tersedia.
                        </td>
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
