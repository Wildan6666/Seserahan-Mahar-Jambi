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
                <div class="flex items-center justify-between p-4 bg-white rounded shadow">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/products/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded">
                        <div>
                            <h2 class="font-bold">{{ $item->product->name }}</h2>
                            <p>Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
                            <p>Qty: {{ $item->quantity }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('cart.remove', $item->product_id) }}">
                        @csrf
                        <button type="submit" class="text-red-600">Hapus</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p>Keranjang kosong.</p>
    @endif
</x-app-layout>
