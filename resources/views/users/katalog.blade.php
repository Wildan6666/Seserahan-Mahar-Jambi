<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="bg-white shadow-lg hover:shadow-xl transition duration-300 ease-in-out p-4 rounded-lg relative">
                
                <!-- Label for Discount or Popularity -->
                @if ($product->is_discounted)
                    <span class="absolute top-0 left-0 bg-red-500 text-white text-xs px-2 py-1 rounded-br-lg">Diskon</span>
                @endif

                @if ($product->image)
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg transition-transform duration-300 hover:scale-105">
                @endif

                <h2 class="mt-3 text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                <p class="text-gray-600">Rp{{ number_format($product->price, 0, ',', '.') }}</p>

                <!-- View Details Button -->
                <a href="{{ route('users.produk.show', $product->slug) }}"
                   class="inline-block mt-3 bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition">
                    Lihat Detail
                </a>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</x-app-layout>
