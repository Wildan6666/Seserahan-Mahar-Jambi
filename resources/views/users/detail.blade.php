<x-app-layout>
   
<div class="grid md:grid-cols-2 gap-12 px-4 sm:px-6 lg:px-8 py-12">
        <!-- Product Image -->
        <div class="flex justify-center mb-6 md:mb-0">
            <div class="relative group">
                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg shadow-xl transition-transform duration-500 ease-in-out transform group-hover:scale-105">
                <!-- Optional: Badge for Discount -->
                @if ($product->is_discounted)
                    <span class="absolute top-4 left-4 bg-red-500 text-white text-xs px-2 py-1 rounded-full">Diskon</span>
                @endif
            </div>
        </div>

        <!-- Product Info -->
        <div class="flex flex-col justify-between">
            <!-- Product Name and Price -->
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h2>
                <p class="text-xl text-teal-600 font-semibold mt-4">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500">Tax included</p>
            </div>

            <!-- Product Description in Box -->
            <div class="bg-white p-6 rounded-lg shadow-lg mb-6 max-w-md mx-auto">
                <p class="text-gray-700 text-base">{{ $product->description }}</p>
            </div>

            <!-- Add to Cart Form -->
            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <div class="flex items-center gap-4 mb-6">
                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-20 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-teal-500" />
                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md text-lg hover:bg-blue-400 transition duration-200 ease-in-out">
                        Tambah ke Keranjang
                    </button>
                </div>
            </form>

            <!-- Sold Out Label (if applicable) -->
            @if($product->stock == 0)
                <div class="bg-gray-400 text-white py-2 px-4 rounded-lg text-center">
                    Sold Out
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
