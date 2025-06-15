<x-app-layout>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahar Kustom - Hadiah Spesial Untuk Momen Spesial</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#F4A460',secondary:'#FFF5EB'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-bg { background-color: #FFF5EB; }
        .testimonial-bg { background-color: #f9fafb; }
        .cta-bg { background-color: rgba(244, 164, 96, 0.1); }
        .footer-bg { background-color: #111827; }
        .product-card { transition: transform 0.3s, box-shadow 0.3s; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1); }
        .header-logo { background: linear-gradient(135deg, #F4A460 0%, #e69138 100%); }
    </style>
</head>
<body class="bg-white">
    
    <!-- Hero Section -->
    <section class="hero-bg bg-gradient-to-r from-blue-100 to-white">
        <div class="container mx-auto px-4 sm:px-6 py-12">
            <div class="flex flex-col md:flex-row items-center">
                <div class="w-full md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-4">Mahar Kustom Spesial</h1>
                    <p class="text-gray-600 mb-6">Hadirkan kenangan indah pernikahan dengan mahar kustom yang dirancang khusus sesuai cerita cinta Anda.</p>
                    <a href="https://wa.me/+6281367047864" class="bg-primary text-white px-5 py-2.5 rounded-button inline-flex items-center whitespace-nowrap hover:bg-opacity-90 transition">
                        <i class="ri-whatsapp-line mr-2"></i>
                        WHATSAPP +
                    </a>
                </div>
                <div class="w-full md:w-1/2 flex justify-center">
                    <div class="relative">
                        <img src="https://cf.shopee.co.id/file/f028b46fb2ca09ba3892928dc358532f" alt="Mahar Kustom" class="rounded-lg shadow-lg w-full max-w-md">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Keuntungan Section -->
    <section class="py-12 px-4 sm:px-6">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold text-center mb-8">Keuntungan Pesan Disini</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="border border-gray-200 p-5 rounded shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold mb-2">Desain Kreatif & Terkini</h3>
                    <p class="text-gray-600 text-sm">Berbagai pilihan desain mahar yang unik dan mengikuti tren terbaru.</p>
                </div>
                <div class="border border-gray-200 p-5 rounded shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold mb-2">Kualitas Tinggi & Tahan Lama</h3>
                    <p class="text-gray-600 text-sm">Dibuat dengan bahan premium oleh pengrajin berpengalaman.</p>
                </div>
                <div class="border border-gray-200 p-5 rounded shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold mb-2">Konsultasi Gratis</h3>
                    <p class="text-gray-600 text-sm">Layanan konsultasi tanpa biaya untuk desain sesuai keinginan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    
   <!-- Produk Unggulan -->
<section class="py-12 px-4 sm:px-6 testibg-gray-50">
    <div class="container mx-auto">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-1">Produk Unggulan</h2>
            <p class="text-gray-600 text-sm">Mahar Spesial Untuk Pasangan Anda</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="product-card bg-white rounded-lg overflow-hidden">
                    <div class="h-56 overflow-hidden">
                         <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold mb-1">{{ $product->name }}</h3>
                        <p class="text-primary font-semibold text-teal-600">IDR {{ number_format($product->price, 0, ',', '.') }}</p>
                        <div class="mt-3 flex justify-between">
                            <a href="{{ route('users.produk.show', $product->slug) }}" class="text-gray-600 hover:text-primary transition flex items-center text-sm">
                                <i class="ri-eye-line mr-1"></i> Detail
                            </a>
                            <a href="{{ route('cart.add', $product->id) }}" class="text-gray-600 hover:text-primary transition flex items-center text-sm">
                                <i class="ri-shopping-cart-add-line mr-1"></i> Beli
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


    <!-- Testimonial Section -->
    <section class="py-12 px-4 sm:px-6 testimonial-bg">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold text-center mb-8">Apa Kata Mereka</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-5 rounded-lg shadow-sm">
                    <div class="flex text-primary mb-3">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-600 mb-4 text-sm">"Mahar akrilik yang saya pesan sangat indah dan detail. Pasangan saya sangat menyukainya!"</p>
                    <div class="flex items-center">
                        <div class="w-9 h-9 bg-primary rounded-full flex items-center justify-center text-white font-bold">A</div>
                        <div class="ml-3">
                            <h4 class="font-semibold text-sm">Ahmad Fauzi</h4>
                            <p class="text-xs text-gray-500">Jambi</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-5 rounded-lg shadow-sm">
                    <div class="flex text-primary mb-3">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-600 mb-4 text-sm">"Desain mahar kayu sangat unik dan berkualitas. Pengiriman cepat dan aman."</p>
                    <div class="flex items-center">
                        <div class="w-9 h-9 bg-primary rounded-full flex items-center justify-center text-white font-bold">S</div>
                        <div class="ml-3">
                            <h4 class="font-semibold text-sm">Siti Nurhaliza</h4>
                            <p class="text-xs text-gray-500">Jambi</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-5 rounded-lg shadow-sm">
                    <div class="flex text-primary mb-3">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                    <p class="text-gray-600 mb-4 text-sm">"Mahar emas menjadi pusat perhatian di acara pernikahan kami. Kualitas luar biasa!"</p>
                    <div class="flex items-center">
                        <div class="w-9 h-9 bg-primary rounded-full flex items-center justify-center text-white font-bold">R</div>
                        <div class="ml-3">
                            <h4 class="font-semibold text-sm">Rudi Hartono</h4>
                            <p class="text-xs text-gray-500">Jambi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
</x-app-layout>