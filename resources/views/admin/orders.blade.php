@extends('layouts.admin')

@section('content')
<div class="p-6" x-data="{ showModal: false, selectedItem: null }">
    <h2 class="text-xl font-semibold mb-4">Daftar Item Pesanan</h2>

    {{-- Tombol Refresh --}}
    <form action="{{ route('admin.orders.refresh') }}" method="POST">
        @csrf
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            🔄 Refresh Status
        </button>
    </form>

    {{-- Tabel Pesanan --}}
    <div class="bg-white rounded shadow overflow-x-auto mt-4">
        <table class="min-w-full text-sm text-gray-800">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Order ID</th>
                    <th class="px-4 py-2">Biaya</th>
                    <th class="px-4 py-2">Produk</th>
                    <th class="px-4 py-2">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $index => $item)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $orderItems->firstItem() + $index }}</td>
                    <td class="px-4 py-2">{{ $item->user->name ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $item->user->email ?? '-' }}</td>
                    <td class="px-4 py-2">
                        @switch($item->status)
                            @case('pending')
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">Menunggu</span>
                                @break
                            @case('settlement')
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Berhasil</span>
                                @break
                            @case('cancel')
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Dibatalkan</span>
                                @break
                            @case('expire')
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Kedaluwarsa</span>
                                @break
                            @default
                                <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs">Dibatalkan</span>
                        @endswitch
                    </td>
                    <td class="px-4 py-2">{{ $item->order_id }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">{{ $item->product->name ?? '-' }}</td>
                    <td class="px-4 py-2">
                      <button
    @click.prevent="fetch('{{ route('products.detail', $item->order_id) }}')
        .then(res => res.json()) 
        .then(data => { 
            selectedItem = data; 
            showModal = true; 
        })"
    class="flex items-center px-3 py-1.5 text-sm font-semibold text-blue-600 bg-blue-50 rounded-md shadow-sm transition-all duration-200 hover:bg-blue-100 hover:shadow-md">
    <i class="ri-eye-fill mr-1 text-blue-500"></i> Lihat Detail
</button>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{ $orderItems->links() }}
        </div>
    </div>

    {{-- Modal --}}
    <div 
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" 
        x-show="showModal" 
        x-transition 
        x-cloak
    >
        <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg">
            <h3 class="text-lg font-semibold mb-4">Detail Pesanan</h3>
           <template x-if="selectedItem">
    <div>
        <p><strong>Nama:</strong> <span x-text="selectedItem.name"></span></p>
        <p><strong>Email:</strong> <span x-text="selectedItem.email"></span></p>
        <p><strong>Alamat:</strong> <span x-text="selectedItem.address"></span></p>
        <p><strong>Total Harga:</strong> Rp <span x-text="Number(selectedItem.total_price).toLocaleString('id-ID')"></span></p>
        <p><strong>Status:</strong> <span x-text="selectedItem.status"></span></p>
        <p><strong>Tanggal Pesanan:</strong> <span x-text="selectedItem.created_at"></span></p>
    </div>
</template>

            <div class="mt-4 text-right">
                <button @click="showModal = false" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
