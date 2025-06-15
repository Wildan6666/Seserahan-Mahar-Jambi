<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
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

                    <div class="text-lg text-gray-800 font-semibold">
                        Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-10">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player
                    src="https://assets6.lottiefiles.com/packages/lf20_V9t630.json"
                    background="transparent"
                    speed="1"
                    class="mx-auto w-64 h-64 mb-6"
                    loop
                    autoplay>
                </lottie-player>

                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum ada pesanan</h3>
                <p class="text-gray-500 mb-4">Yuk, mulai belanja dan pesan produk favoritmu!</p>
                <a href="{{ route('users.katalog') }}"
                   class="inline-block px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                    Kembali ke Katalog
                </a>
            </div>
        @endforelse

        @if ($orderItems->hasPages())
            <div class="mt-6">
                {{ $orderItems->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
