@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white shadow rounded-lg p-4">
            <h2 class="text-gray-700 font-semibold">Total pesanan hari ini</h2>
            <div class="text-3xl font-bold text-blue-500">5</div>
            <p class="text-sm text-gray-400">Last 24 hours</p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
            <h2 class="text-gray-700 font-semibold">Total pesanan bulan ini</h2>
            <div class="text-3xl font-bold text-red-500">20</div>
            <p class="text-sm text-gray-400">Last 24 hours</p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
            <h2 class="text-gray-700 font-semibold">Jumlah Katalog</h2>
            <div class="text-3xl font-bold text-green-500">44</div>
            <p class="text-sm text-gray-400">Last 24 hours</p>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-4">
        <h2 class="text-xl font-bold mb-4">Pesanan Baru</h2>
        <table class="w-full text-left table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Nama Pelanggan</th>
                    <th class="px-4 py-2">Produk</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="px-4 py-2">Wildan</td>
                    <td class="px-4 py-2">Mahar Akrilik</td>
                    <td class="px-4 py-2">25 April 2024</td>
                    <td class="px-4 py-2 text-yellow-500">Menunggu</td>
                    <td class="px-4 py-2"><a href="#" class="text-blue-600">Edit</a></td>
                </tr>
                <!-- Tambahkan baris lain sesuai data -->
            </tbody>
        </table>
    </div>
@endsection
