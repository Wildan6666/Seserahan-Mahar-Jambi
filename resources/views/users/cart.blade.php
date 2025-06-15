<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-8">

        @if (session('success'))
            <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        @if ($cart->count())
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Keranjang Belanja Anda</h1>

            <div class="space-y-4">
                @foreach ($cart as $item)
                    <div class="flex items-center justify-between p-4 bg-white rounded-xl shadow hover:shadow-lg transition duration-300">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('images/products/' . $item->product->image) }}"
                                 alt="{{ $item->product->name }}"
                                 class="w-20 h-20 object-cover rounded-lg shadow-sm">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">{{ $item->product->name }}</h2>
                                <p class="text-gray-600">Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-500">Jumlah: {{ $item->quantity }}</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('cart.remove', $item->product_id) }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-1 text-red-600 hover:text-red-800 font-medium transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            @php
                $subtotal = $cart->sum(fn($item) => $item->product->price * $item->quantity);
            @endphp

            <div class="mt-8 p-6 bg-gray-50 border rounded-lg text-right text-xl font-semibold text-gray-800 shadow-sm">
                Subtotal: Rp{{ number_format($subtotal, 0, ',', '.') }}
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('checkout') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-blue-500 hover:bg-blue-300 text-white text-lg font-semibold rounded-xl shadow transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6H19m-7 0a1 1 0 102 0" />
                    </svg>
                    Checkout Sekarang
                </a>
            </div>
        @else
            <div class="text-center mt-16 text-gray-700">
    {{-- Lottie Animation --}}
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <lottie-player
        src="https://assets4.lottiefiles.com/packages/lf20_HpFqiS.json"
        background="transparent"
        speed="1"
        class="mx-auto w-64 h-64 mb-6"
        loop
        autoplay>
    </lottie-player>

    <h2 class="text-2xl font-semibold mb-2">Keranjang Anda Kosong</h2>
    <p class="text-gray-500 mb-6">Yuk, jelajahi produk kami dan mulai belanja!</p>
    <a href="{{ route('users.katalog') }}"
       class="inline-block px-6 py-3 bg-green-500 text-white text-sm font-semibold rounded-lg hover:bg-green-600 transition">
        Kembali ke Katalog
    </a>
</div>


            {{-- Include Lottie player --}}
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player
                src="https://assets10.lottiefiles.com/packages/lf20_cgkbrlwh.json"
                background="transparent"
                speed="1"
                class="hidden"
                style="display: none"
                loop
                autoplay>
            </lottie-player>
        @endif

    </div>
</x-app-layout>
