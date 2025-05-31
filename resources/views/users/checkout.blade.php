<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-800">Checkout</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">Ringkasan Pesanan</h2>

            <div class="divide-y divide-gray-200">
                @foreach ($cartItems as $item)
                    <div class="flex justify-between items-center py-4">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('images/products/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-md border">
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $item->product->name }}</h3>
                                <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-800 font-semibold">
                                Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-end border-t pt-4">
                <p class="text-lg font-bold text-gray-900">Total: Rp{{ number_format($total, 0, ',', '.') }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('checkout.process') }}" class="mt-8 bg-white shadow-md rounded-lg p-6">
            @csrf
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">Alamat Pengiriman</h2>

            <textarea 
                name="address" 
                id="address" 
                rows="4" 
                required 
                placeholder="Masukkan alamat lengkap pengiriman Anda"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none transition duration-150 ease-in-out"
            >{{ old('address') }}</textarea>
            @error('address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror

            <button 
                type="submit" 
                class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md shadow-sm transition duration-200"
            >
                Lanjutkan Checkout
            </button>
        </form>
    </div>
</x-app-layout>
