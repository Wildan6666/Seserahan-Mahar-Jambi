<x-app-layout>
    <x-slot name="header">
        Keranjang Belanja
    </x-slot>

    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    @if ($cart->count())
        <div class="space-y-4">
            @foreach ($cart as $item)
                <div class="flex items-center justify-between p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/products/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded">
                        <div>
                            <h2 class="font-bold text-lg">{{ $item->product->name }}</h2>
                            <p class="text-gray-600">Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
                            <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('cart.remove', $item->product_id) }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-1 text-red-600 hover:text-red-800 font-semibold">
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

        <div class="mt-6 p-4 bg-gray-100 rounded text-right font-semibold text-lg">
            Subtotal: Rp{{ number_format($subtotal, 0, ',', '.') }}
        </div>

        <div class="mt-6 flex justify-center">
            <a href="{{ route('checkout') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white text-lg rounded-xl hover:bg-blue-700 shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6H19m-7 0a1 1 0 102 0" />
                </svg>
                Checkout
            </a>
        </div>
    @else
        <div class="text-center text-gray-600 mt-10">
            <img src="{{ asset('images/empty-cart.svg') }}" alt="Keranjang kosong" class="mx-auto w-48 mb-4">
            Keranjang Anda masih kosong. Yuk, belanja dulu!
        </div>
    @endif
</x-app-layout>
