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
    <section class="hero-bg">
        <div class="container mx-auto px-4 sm:px-6 py-12">
            <div class="flex flex-col md:flex-row items-center">
                <div class="w-full md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-4">Mahar Kustom Spesial</h1>
                    <p class="text-gray-600 mb-6">Hadirkan kenangan indah pernikahan dengan mahar kustom yang dirancang khusus sesuai cerita cinta Anda.</p>
                    <a href="#" class="bg-primary text-white px-5 py-2.5 rounded-button inline-flex items-center whitespace-nowrap hover:bg-opacity-90 transition">
                        <i class="ri-whatsapp-line mr-2"></i>
                        WHATSAPP +
                    </a>
                </div>
                <div class="w-full md:w-1/2 flex justify-center">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1605733513597-a8f8341084e6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&h=700&q=80" alt="Mahar Kustom" class="rounded-lg shadow-lg w-full max-w-md">
                        <a href="#" class="absolute bottom-4 right-4 bg-primary text-white px-4 py-2 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">DETAILS</a>
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
                        <p class="text-primary font-semibold">IDR {{ number_format($product->price, 0, ',', '.') }}</p>
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

    <!-- CTA Section -->
    <section class="py-12 px-4 sm:px-6 cta-bg">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">Siap Memesan Mahar Kustom?</h2>
            <p class="text-gray-600 max-w-lg mx-auto mb-6">Buat momen pernikahan lebih berkesan dengan mahar kustom yang dirancang khusus.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-3">
                <a href="#" class="bg-primary text-white px-6 py-2.5 rounded-button inline-flex items-center justify-center hover:bg-opacity-90 transition">
                    <i class="ri-whatsapp-line mr-2"></i>
                    Hubungi via WhatsApp
                </a>
                <a href="{{ route('users.katalog') }}" class="bg-white border border-primary text-primary px-6 py-2.5 rounded-button inline-flex items-center justify-center hover:bg-primary hover:text-white transition">
                    <i class="ri-gallery-line mr-2"></i>
                    Lihat Katalog
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-bg text-white pt-12 pb-6">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="header-logo w-9 h-9 rounded flex items-center justify-center">
                            <span class="font-['Pacifico'] text-white text-lg">M</span>
                        </div>
                        <span class="ml-2 font-bold">Mahar Kustom</span>
                    </div>
                    <p class="text-gray-400 mb-4 text-sm">Hadirkan kenangan indah pernikahan dengan mahar kustom.</p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-instagram-fill"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-base font-bold mb-3">Produk Kami</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition text-sm">Mahar Kayu</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition text-sm">Mahar Akrilik</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition text-sm">Mahar Emas</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-base font-bold mb-3">Informasi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition text-sm">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition text-sm">Cara Pemesanan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition text-sm">Pengiriman</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-base font-bold mb-3">Kontak Kami</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="ri-map-pin-line mt-1 mr-2 text-gray-400"></i>
                            <span class="text-gray-400 text-sm">Jl. Mawar No. 123, Kota Jambi</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ri-phone-line mr-2 text-gray-400"></i>
                            <span class="text-gray-400 text-sm">+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center">
                            <i class="ri-mail-line mr-2 text-gray-400"></i>
                            <span class="text-gray-400 text-sm">info@maharkustom.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-6 border-t border-gray-800 text-center">
                <p class="text-gray-400 text-sm">© 2025 Mahar Kustom. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
</x-app-layout>