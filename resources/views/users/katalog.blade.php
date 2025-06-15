<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
       @foreach ($products as $product)
    <div class="bg-white shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out p-4 rounded-xl relative">
        @if ($product->is_discounted)
            <span class="absolute top-0 left-0 bg-red-500 text-white text-xs px-2 py-1 rounded-br-lg">Diskon</span>
        @endif

        @if ($product->image)
            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}"
                 class="w-full h-48 object-cover rounded-lg transition-transform duration-300 hover:scale-105">
        @endif

        <h2 class="mt-4 text-xl font-semibold text-gray-900">{{ $product->name }}</h2>

        <div class="mt-1">
            @if ($product->is_discounted && $product->original_price)
                <p class="text-sm text-gray-500 line-through">Rp{{ number_format($product->original_price, 0, ',', '.') }}</p>
            @endif
            <p class="text-lg font-bold text-teal-600">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
        </div>

        <a href="{{ route('users.produk.show', $product->slug) }}"
           class="inline-flex items-center mt-4 bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-300 transition">
            <i class="ri-eye-line mr-1"></i> Lihat Detail
        </a>
    </div>
@endforeach

    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</x-app-layout>
