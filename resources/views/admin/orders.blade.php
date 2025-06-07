@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Daftar Item Pesanan</h2>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full text-sm text-gray-800">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Order ID</th>
                    <th class="px-4 py-2">Biaya</th>
                    <th class="px-4 py-2">Produk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $index => $item)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $orderItems->firstItem() + $index }}</td>
                    <td class="px-4 py-2">{{ $item->user->name ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $item->user->email ?? '-' }}</td>
                    <td class="px-4 py-2">
                        @switch($item->status)
                            @case('settlement')
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Berhasil</span>
                                @break
                            @case('cancelled')
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Dibatalkan</span>
                                @break
                            @case('expire')
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Kedaluwarsa</span>
                                @break
                            @default
                                <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs">-</span>
                        @endswitch
                    </td>
                    <td class="px-4 py-2">{{ $item->order_id }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">{{ $item->product->name ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{ $orderItems->links() }}
        </div>
    </div>
     {{-- Tombol Refresh Status --}}
    <form action="{{ route('admin.orders.refresh') }}" method="POST">
        @csrf
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            🔄 Refresh Status
        </button>
    </form>
</div>
@endsection
