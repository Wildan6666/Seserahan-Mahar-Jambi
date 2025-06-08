@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    <div class="flex items-center space-x-3">
        <span class="text-sm text-gray-500 hidden sm:inline">Selamat datang,</span>
        <div class="bg-white px-4 py-2 rounded-full shadow text-sm font-medium text-gray-700">
            {{ Auth::user()->name }}
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white shadow-md rounded-xl p-6 transform transition duration-300 hover:scale-105">
        <h2 class="text-gray-700 font-semibold">Total Pesanan Hari Ini</h2>
        <div class="text-4xl font-bold text-blue-500 mt-2">5</div>
        <p class="text-sm text-gray-400">Dalam 24 jam terakhir</p>
    </div>
    <div class="bg-white shadow-md rounded-xl p-6 transform transition duration-300 hover:scale-105">
        <h2 class="text-gray-700 font-semibold">Total Pesanan Bulan Ini</h2>
        <div class="text-4xl font-bold text-red-500 mt-2">20</div>
        <p class="text-sm text-gray-400">Bulan berjalan</p>
    </div>
    <div class="bg-white shadow-md rounded-xl p-6 transform transition duration-300 hover:scale-105">
        <h2 class="text-gray-700 font-semibold">Jumlah Katalog</h2>
        <div class="text-4xl font-bold text-green-500 mt-2">44</div>
        <p class="text-sm text-gray-400">Total produk tersedia</p>
    </div>
</div>

<div class="bg-white shadow-md rounded-xl p-6 overflow-x-auto">
    <h2 class="text-xl font-bold mb-4">Pesanan Baru</h2>
    <table class="min-w-full text-left">
        <thead class="bg-gray-100 text-gray-600 text-sm">
            <tr>
                <th class="px-4 py-2">Nama Pelanggan</th>
                <th class="px-4 py-2">Produk</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            <tr class="border-t hover:bg-gray-50 transition">
                <td class="px-4 py-2">Asep</td>
                <td class="px-4 py-2">Mahar Akrilik</td>
                <td class="px-4 py-2">25 April 2024</td>
                <td class="px-4 py-2">
                    <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-xs font-medium">Menunggu</span>
                </td>
                <td class="px-4 py-2">
                    <a href="#" class="text-bluze-600 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
