<x-app-layout>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" x-data="{ showModal: false, selectedItem: null }">
    <h2 class="text-2xl font-bold text-gray-800 mb-8 border-b pb-2">Pesanan Saya</h2>

    @forelse ($orderItems as $item)
        <div class="bg-white rounded-xl shadow-md p-6 mb-6 transition hover:shadow-lg hover:scale-[1.01] duration-300">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4">
                <div>
                    <p class="text-sm text-gray-500 mb-1">
                        <span class="font-semibold">ID:</span> {{ $item->id }}
                    </p>
                    <p class="text-sm text-gray-500">
                        <span class="font-semibold">Tanggal:</span> {{ $item->created_at->format('d M Y, H:i') }}
                    </p>
                </div>

                @if (in_array($item->status, ['pending', 'menunggu']))
                    <form method="POST" action="{{ route('orders.cancel', $item->id) }}">
                        @csrf
                        @method('PATCH')
                        <button 
                            type="submit"
                            class="mt-2 sm:mt-0 px-4 py-2 bg-red-500 text-white text-sm font-semibold rounded-lg hover:bg-red-600 transition">
                            Batalkan
                        </button>
                    </form>
                @endif
            </div>

            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <div class="space-y-1">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $item->product->name }}</h3>
                    <p class="text-sm text-gray-600">
                        <span class="font-medium">Jumlah:</span> {{ $item->quantity }}
                    </p>
                    <p class="text-sm text-gray-600">
                        <span class="font-medium">Status pembayaran:</span>
                        <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold
                            {{ $item->status == 'pending' ? 'bg-blue-100 text-blue-700' :
                               ($item->status == 'settlement' ? 'bg-green-100 text-green-700' :
                               ($item->status == 'cancel' ? 'bg-red-100 text-red-700' : 'bg-gray-200 text-gray-700')) }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </p>
                </div>

                <div class="text-right space-y-2">
                    <div class="text-lg text-gray-800 font-semibold">
                        Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                    </div>
                    <button 
    @click.prevent="fetch('{{ route('products.detail', $item->order_id) }}')
        .then(res => res.json()) 
        .then(data => { 
            selectedItem = data; 
            showModal = true; 
        })"
    class="flex items-center px-3 py-1.5 text-sm font-semibold text-blue-600 bg-blue-50 rounded-md shadow-sm transition-all duration-200 hover:bg-blue-100 hover:shadow-md">
    <i class="ri-eye-fill mr-1 text-blue-500"></i> Detail
</button>

                </div>
            </div>
        </div>
    @empty
        {{-- kosong --}}
    @endforelse

    @if ($orderItems->hasPages())
        <div class="mt-6">
            {{ $orderItems->links() }}
        </div>
    @endif

    {{-- Modal --}}
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" 
        x-show="showModal" x-transition x-cloak>
        <div class="bg-white p-6 rounded-xl w-full max-w-md shadow-lg">
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
</x-app-layout>
