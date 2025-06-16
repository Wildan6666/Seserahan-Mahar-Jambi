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
            <!-- Search Input -->
            <input type="text" id="search" placeholder="🔍 Cari produk..." 
                class="w-full sm:w-1/2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-400 focus:outline-none transition" />

            <!-- Add Product Button -->
            <a href="{{ route('products.create') }}"
            class="inline-flex items-center gap-2 px-5 py-2 bg-purple-600 text-white text-sm font-medium rounded-full shadow hover:bg-purple-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Produk
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
            <tbody class="divide-y divide-gray-100" id="product-table">
                @forelse ($products as $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-4 flex items-center gap-4">
                            <img src="{{ asset('images/products/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-16 h-16 object-cover rounded-md border" />
                            <span class="font-medium text-gray-800 product-name">{{ $product->name }}</span>
                        </td>
                        <td class="px-4 py-4 text-gray-700">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-4 text-sm text-green-600 font-medium">
                            In stock ({{ $product->stock }})
                        </td>
                              <td class="px-4 py-4 text-sm">
    <div class="flex items-center gap-3">
        <!-- Tombol Edit -->
        <a href="{{ route('products.edit', $product->id) }}"
           class="flex items-center gap-2 px-3 py-1.5 bg-blue-100 text-blue-700 rounded-full hover:bg-blue-200 transition"
           title="Edit Produk">
                <path fill-rule="evenodd" d="M17.414 2.586a2 2 0 010 2.828L7.828 13H5v-2l9.586-9.586a2 2 0 012.828 0z" clip-rule="evenodd" />
            <span>Edit</span>
        </a>

        <!-- Tombol Hapus -->
        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="flex items-center gap-2 px-3 py-1.5 bg-red-100 text-red-700 rounded-full hover:bg-red-200 transition"
                    title="Hapus Produk">
           
                    <path fill-rule="evenodd" d="M6 2a2 2 0 012-2h4a2 2 0 012 2h6a2 2 0 012 2v14a2 2 0 01-2 2H4a2 2 0 01-2-2V4a2 2 0 012-2h6z" clip-rule="evenodd" />

                <span>Hapus</span>
            </button>
        </form>
    </div>
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


<script>
document.getElementById('search').addEventListener('input', function () {
    const keyword = this.value;
    
    fetch(`/admin/products/search?query=${keyword}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(products => {
        const tbody = document.getElementById('product-table');
        tbody.innerHTML = '';

        if (products.length === 0) {
            tbody.innerHTML = `<tr><td colspan="4" class="text-center text-gray-500">Produk tidak ditemukan</td></tr>`;
            return;
        }

        products.forEach(product => {
            tbody.innerHTML += `
                <tr>
                    <td class="px-4 py-4">${product.name}</td>
                    <td class="px-4 py-4">Rp ${Number(product.price).toLocaleString('id-ID')}</td>
                    <td class="px-4 py-4">${product.stock}</td>
                    <td class="px-4 py-4">
                        <a href="/products/${product.id}/edit" class="text-blue-500">Edit</a>
                    </td>
                </tr>
            `;
        });
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
});
</script>


@endsection


