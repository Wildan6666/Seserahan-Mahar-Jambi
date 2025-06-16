@extends('layouts.admin') {{-- atau layouts.admin jika admin --}}

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Detail Pesanan</h2>

    <p><strong>Nama:</strong> {{ $order->user->name }}</p>
    <p><strong>Email:</strong> {{ $order->user->email }}</p>
    <p><strong>Alamat:</strong> {{ $order->address }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>

    <h3 class="text-lg font-semibold mt-4">Item Pesanan</h3>
    <ul class="mt-2 list-disc pl-6">
        @foreach ($order->items as $item)
            <li>{{ $item->product->name }} - {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</li>
        @endforeach
    </ul>
</div>
@endsection
