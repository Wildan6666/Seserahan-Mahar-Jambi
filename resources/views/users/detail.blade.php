<x-app-layout>
    <x-slot name="header">
        Detail Produk
    </x-slot>

    <div class="grid md:grid-cols-2 gap-6">
        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto rounded">

        <div>
            <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
            <p class="text-gray-600 mb-4">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="mb-4">{{ $product->description }}</p>

            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <div class="flex gap-2 items-center">
                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-20 border rounded p-1">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah ke Keranjang</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
