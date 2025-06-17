<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## Marlina - Seserahan Mahar Jambi

**Marlina** adalah website penjualan mahar yang memudahkan pengguna melihat katalog, memesan produk, dan memantau status pesanan secara online. Dibuat oleh Kelompok 4 untuk memenuhi tugas Proyek Pengembangan Sistem Informasi. Website ini mendukung digitalisasi pemesanan seserahan mahar dan mempermudah aktivitas pengguna serta admin secara efisien.

---

## 🚀 Instalasi

Pastikan kamu sudah menginstal **PHP ≥ 8.1**, **Composer**, dan **Node.js + NPM** di komputermu.

1. Clone repository
```bash
git clone https://github.com/nama-user/nama-repo.git
cd nama-repo
```

2. Install dependensi PHP
```bash
composer install
```

3.Salin file .env dan generate app key 
```bash
cp .env.example .env
php artisan key:generate
```

4.Konfigurasi database di file .env
```bash
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

5. Jalankan migrasi
```bash
Jalankan migrasi
```

6. Install dependensi frontend 
```bash
npm install
```

7. Jalankan server lokal
#buka 2 terminal
```bash
npm run dev
php artisan serve
```

## 💳 Integrasi Midtrans (Payment Gateway)

Untuk mengaktifkan pembayaran online menggunakan Midtrans, ikuti langkah-langkah berikut:

 1. Daftar dan login ke Midtrans

- Buka [https://dashboard.midtrans.com/](https://dashboard.midtrans.com/)
- Pilih **Environment: Sandbox** untuk pengujian
- Catat **Server Key** dan **Client Key**

 2. Install Midtrans PHP SDK
```bash
composer require midtrans/midtrans-php
```
3. Tambahkan konfigurasi Midtrans di .env
```bash
MIDTRANS_CLIENT_KEY=your_client_key
MIDTRANS_SERVER_KEY=your_server_key
MIDTRANS_IS_PRODUCTION=false
```

4. Inisialisasi Midtrans (contoh di AppServiceProvider atau controller)
```bash
\Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
\Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;
```

5. Gunakan pembayaran Snap dengan params
# Untuk informasi lebih lanjut, silakan buka dokumentasi resmi Midtrans: https://docs.midtrans.com


