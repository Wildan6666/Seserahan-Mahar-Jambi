<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Pesanan Saya</h2>

        @forelse ($orders as $order)
            <div class="bg-white shadow-md rounded-lg p-6 mb-6 border">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <p class="text-sm text-gray-600">Order ID: {{ $order->id }}</p>
                        <p class="text-sm text-gray-600">Status: <span class="font-semibold capitalize">{{ $order->status }}</span></p>
                        <p class="text-sm text-gray-600">Tanggal: {{ $order->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    @if ($order->status === 'pending')
                        <form method="POST" action="{{ route('orders.cancel', $order->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-sm text-red-600 hover:underline">Batalkan</button>
                        </form>
                    @endif
                </div>

                <div class="divide-y">
                    @foreach ($order->items as $item)
                        <div class="py-2 flex justify-between items-center">
                            <div>
                                <p class="font-medium">{{ $item->product->name }}</p>
                                <p class="text-sm text-gray-600">Jumlah: {{ $item->quantity }}</p>
                            </div>
                            <div class="text-sm text-gray-800 font-semibold">
                                Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-right mt-4">
                    <span class="font-semibold text-gray-800">Total: Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada pesanan.</p>
        @endforelse
    </div>
</x-app-layout>
