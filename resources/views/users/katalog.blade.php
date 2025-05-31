<x-app-layout>
    <x-slot name="header">
        Katalog Produk
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($products as $product)
            <div class="bg-white shadow p-4 rounded">
                @if ($product->image)
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
                @endif
                <h2 class="mt-2 text-lg font-bold">{{ $product->name }}</h2>
                <p class="text-gray-600">Rp{{ number_format($product->price, 0, ',', '.') }}</p>

                <!-- Tombol Lihat Detail -->
                <a href="{{ route('users.produk.show', $product->slug) }}"
                   class="inline-block mt-3 bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700">
                    Lihat Detail
                </a>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</x-app-layout>
