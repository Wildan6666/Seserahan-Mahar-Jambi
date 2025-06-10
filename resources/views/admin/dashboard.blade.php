@extends('layouts.admin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Statistik Utama</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- Jumlah Pengguna -->
                    <div class="bg-blue-100 p-4 rounded-xl shadow">
                        <div class="text-sm text-gray-600">Jumlah Pengguna</div>
                        <div class="text-2xl font-bold text-blue-800 mt-1">{{ $userCount }}</div>
                    </div>

                    <!-- Total Pesanan -->
                    <div class="bg-green-100 p-4 rounded-xl shadow">
                        <div class="text-sm text-gray-600">Total Pesanan</div>
                        <div class="text-2xl font-bold text-green-800 mt-1">{{ $orderCount }}</div>
                    </div>

                    <!-- Total Pendapatan -->
                    <div class="bg-yellow-100 p-4 rounded-xl shadow">
                        <div class="text-sm text-gray-600">Total Pendapatan</div>
                        <div class="text-2xl font-bold text-yellow-800 mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                    </div>

                    <!-- Produk Terlaris -->
                    <div class="bg-red-100 p-4 rounded-xl shadow">
                        <div class="text-sm text-gray-600">Produk Terlaris</div>
                        <div class="text-md font-semibold text-red-800 mt-1">{{ $topProductName }}</div>
                    </div>

                </div>
            </section>
        </div>
    </div>

        <div class="bg-white p-6 rounded-xl shadow-md mt-6">
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <h2 class="text-xl font-semibold mb-4">Grafik Penjualan (6 Bulan Terakhir)</h2>
            <canvas id="salesChart" height="100"></canvas>
        </div>

        <div class="bg-white p-4 rounded shadow mt-6">
            <h2 class="text-xl font-semibold mb-4">Pesanan Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">#ID</th>
                            <th class="px-4 py-2">Nama Pengguna</th>
                            <th class="px-4 py-2">Alamat</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Tanggal</th>
                        </tr>
            </thead>
            <tbody>
            @forelse ($latestOrders as $order)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-700">{{ $order->id }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $order->user->name }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $order->address }}</td>
                    <td class="px-4 py-2 text-red-600 font-semibold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 font-semibold capitalize text-gray-800">{{ $order->status }}</td>
                    <td class="px-4 py-2 font-bold text-gray-700">{{ $order->created_at->format('d M Y') }}</td>
                </tr>
                     @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada pesanan.</td>
                </tr>
            @endforelse
        </tbody>

        </table>
    </div>

<div class="bg-white p-4 rounded shadow mt-6">
    <h2 class="text-xl font-semibold mb-4">Produk dengan Stok Rendah</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nama Produk</th>
                    <th class="px-4 py-2">Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lowStockProducts as $product)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $product->id }}</td>
                        <td class="px-4 py-2">{{ $product->name }}</td>
                        <td class="px-4 py-2 text-red-600 font-bold">{{ $product->stock }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center py-4">Tidak ada produk dengan stok rendah.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>




</div>


 <script>
    //grafik penjualan 
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($salesData['labels']),
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: @json($salesData['data']),
                fill: true,
                backgroundColor: 'rgba(59, 130, 246, 0.2)', // blue-500
                borderColor: 'rgba(59, 130, 246, 1)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: value => 'Rp ' + value.toLocaleString()
                    }
                }
            }
        }
    });
</script>

 @endsection   





