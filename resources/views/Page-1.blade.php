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
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Inter', sans-serif;
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-black text-white py-4 px-6">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center">
                <a href="#" class="flex items-center">
                    <div class="w-10 h-10 bg-primary rounded flex items-center justify-center">
                        <span class="font-['Pacifico'] text-white text-xl">logo</span>
                    </div>
                </a>
            </div>
            
            <nav class="hidden md:flex space-x-12">
                <a href="#" class="text-primary font-medium">HOME</a>
                <a href="#" class="text-white hover:text-primary transition">PRODUK</a>
                <a href="#" class="text-white hover:text-primary transition">ABOUT</a>
            </nav>
            
            <div class="flex items-center space-x-6">
                <a href="#" class="relative flex items-center text-white hover:text-primary transition">
                    <div class="w-6 h-6 flex items-center justify-center">
                        <i class="ri-shopping-cart-2-line ri-lg"></i>
                    </div>
                    <span class="ml-2">My Cart (12)</span>
                </a>
                <a href="#" class="flex items-center text-white hover:text-primary transition">
                    <div class="w-6 h-6 flex items-center justify-center">
                        <i class="ri-user-3-line ri-lg"></i>
                    </div>
                    <span class="ml-2 text-xs">Profile</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative" style="background-color: #FFF5EB;">
        <div class="container mx-auto px-6 py-16">
            <div class="flex flex-col md:flex-row items-center">
                <div class="w-full md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-5xl font-bold text-gray-800 mb-6">Spesial Kustom Mahar</h1>
                    <p class="text-gray-600 mb-8 text-lg">Hadirkan kenangan indah pernikahan Anda dengan mahar kustom yang dirancang khusus sesuai keinginan dan cerita cinta Anda.</p>
                    <a href="#" class="bg-primary text-white px-6 py-3 rounded-button inline-flex items-center whitespace-nowrap hover:bg-opacity-90 transition">
                        <div class="w-5 h-5 flex items-center justify-center mr-2">
                            <i class="ri-whatsapp-line"></i>
                        </div>
                        WHATSAPP +
                    </a>
                </div>
                <div class="w-full md:w-1/2 flex justify-center">
                    <div class="relative">
                        <img src="https://readdy.ai/api/search-image?query=elegant%20wedding%20gift%20box%20with%20Islamic%20calligraphy%2C%20gold%20ornaments%2C%20soft%20lighting%2C%20professional%20product%20photography%2C%20white%20background%2C%20luxury%20wedding%20gift&width=500&height=600&seq=1&orientation=portrait" alt="Mahar Kustom" class="rounded-lg shadow-lg object-cover object-top">
                        <a href="#" class="absolute bottom-0 right-0 bg-primary text-white px-6 py-3 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">DETAILS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Keuntungan Section -->
    <section class="py-16 px-6">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">Keuntungan pesan disini</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="border border-gray-200 p-6 rounded shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold mb-3">Menawarkan berbagai desain mahar kreatif dan juga terkini</h3>
                    <p class="text-gray-600">Kami selalu mengikuti tren terbaru dalam desain mahar, memberikan pilihan yang beragam dan unik untuk momen spesial Anda.</p>
                </div>
                <div class="border border-gray-200 p-6 rounded shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold mb-3">Memiliki kualitas tinggi yang akan tampak sempurna dan tahan lama</h3>
                    <p class="text-gray-600">Setiap mahar dibuat dengan bahan premium dan dikerjakan oleh pengrajin berpengalaman untuk memastikan hasil yang sempurna.</p>
                </div>
                <div class="border border-gray-200 p-6 rounded shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold mb-3">Konsultasi desain dan informasi secara gratis</h3>
                    <p class="text-gray-600">Kami menyediakan layanan konsultasi tanpa biaya untuk membantu Anda mendapatkan mahar yang sesuai dengan keinginan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Spesial For You Section -->
    <section class="py-16 px-6 bg-gray-50">
        <div class="container mx-auto">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Spesial For You</h2>
                <p class="text-gray-600">Mahar Spesial Untuk Pasangan Anda</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Mahar Kayu -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="h-64 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=wooden%20wedding%20gift%20frame%20with%20Islamic%20calligraphy%20and%20floral%20decorations%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20elegant%20presentation&width=400&height=300&seq=2&orientation=landscape" alt="Mahar Kayu" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Mahar Kayu</h3>
                        <p class="text-primary font-semibold">IDR 379.000</p>
                        <div class="mt-4 flex justify-between">
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-eye-line"></i>
                                </div>
                                Detail
                            </a>
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-shopping-cart-add-line"></i>
                                </div>
                                Beli
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Mahar Akrilik -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="h-64 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=acrylic%20wedding%20gift%20with%20gold%20details%20and%20Islamic%20calligraphy%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20elegant%20presentation&width=400&height=300&seq=3&orientation=landscape" alt="Mahar Akrilik" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Mahar Akrilik</h3>
                        <p class="text-primary font-semibold">IDR 459.000</p>
                        <div class="mt-4 flex justify-between">
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-eye-line"></i>
                                </div>
                                Detail
                            </a>
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-shopping-cart-add-line"></i>
                                </div>
                                Beli
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Mahar Emas -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="h-64 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=gold-plated%20wedding%20gift%20with%20Islamic%20calligraphy%20and%20ornate%20details%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20elegant%20presentation&width=400&height=300&seq=4&orientation=landscape" alt="Mahar Emas" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Mahar Emas</h3>
                        <p class="text-primary font-semibold">IDR 1.235.000</p>
                        <div class="mt-4 flex justify-between">
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-eye-line"></i>
                                </div>
                                Detail
                            </a>
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-shopping-cart-add-line"></i>
                                </div>
                                Beli
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Mahar Jam -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="h-64 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=elegant%20clock%20wedding%20gift%20with%20Islamic%20calligraphy%20and%20floral%20details%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20elegant%20presentation&width=400&height=300&seq=5&orientation=landscape" alt="Mahar Jam" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Mahar Jam</h3>
                        <p class="text-primary font-semibold">IDR 529.000</p>
                        <div class="mt-4 flex justify-between">
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-eye-line"></i>
                                </div>
                                Detail
                            </a>
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-shopping-cart-add-line"></i>
                                </div>
                                Beli
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Mahar Alat Sholat -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="h-64 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=elegant%20prayer%20set%20wedding%20gift%20with%20Islamic%20calligraphy%2C%20prayer%20mat%2C%20Quran%2C%20and%20prayer%20beads%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20elegant%20presentation&width=400&height=300&seq=6&orientation=landscape" alt="Mahar Alat Sholat" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Mahar Alat Sholat</h3>
                        <p class="text-primary font-semibold">IDR 599.000</p>
                        <div class="mt-4 flex justify-between">
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-eye-line"></i>
                                </div>
                                Detail
                            </a>
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-shopping-cart-add-line"></i>
                                </div>
                                Beli
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Mahar Perhiasan -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="h-64 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=elegant%20jewelry%20wedding%20gift%20set%20with%20Islamic%20calligraphy%2C%20gold%20necklace%2C%20earrings%2C%20and%20ring%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20elegant%20presentation&width=400&height=300&seq=7&orientation=landscape" alt="Mahar Perhiasan" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Mahar Perhiasan</h3>
                        <p class="text-primary font-semibold">IDR 859.000</p>
                        <div class="mt-4 flex justify-between">
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-eye-line"></i>
                                </div>
                                Detail
                            </a>
                            <a href="#" class="text-gray-600 hover:text-primary transition flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-1">
                                    <i class="ri-shopping-cart-add-line"></i>
                                </div>
                                Beli
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Best Seller Section -->
    <section class="py-16 px-6">
        <div class="container mx-auto">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Best Seller</h2>
                <p class="text-gray-600">Mahar Yang Paling Sering Dibeli</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Mahar Akrilik -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="h-48 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=acrylic%20wedding%20gift%20with%20gold%20details%20and%20Islamic%20calligraphy%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20elegant%20presentation&width=300&height=200&seq=8&orientation=landscape" alt="Mahar Akrilik" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Mahar Akrilik</h3>
                        <p class="text-primary font-semibold">IDR 459.000</p>
                        <a href="#" class="mt-3 inline-block text-primary hover:underline">Lihat Detail</a>
                    </div>
                </div>
                
                <!-- Mahar Emas -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="h-48 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=gold-plated%20wedding%20gift%20with%20Islamic%20calligraphy%20and%20ornate%20details%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20elegant%20presentation&width=300&height=200&seq=9&orientation=landscape" alt="Mahar Emas" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Mahar Emas</h3>
                        <p class="text-primary font-semibold">IDR 1.235.000</p>
                        <a href="#" class="mt-3 inline-block text-primary hover:underline">Lihat Detail</a>
                    </div>
                </div>
                
                <!-- Mahar Alat Sholat -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="h-48 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=elegant%20prayer%20set%20wedding%20gift%20with%20Islamic%20calligraphy%2C%20prayer%20mat%2C%20Quran%2C%20and%20prayer%20beads%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20elegant%20presentation&width=300&height=200&seq=10&orientation=landscape" alt="Mahar Alat Sholat" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Mahar Alat Sholat</h3>
                        <p class="text-primary font-semibold">IDR 599.000</p>
                        <a href="#" class="mt-3 inline-block text-primary hover:underline">Lihat Detail</a>
                    </div>
                </div>
                
                <!-- Mahar Wayang -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="h-48 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=traditional%20Javanese%20wayang%20wedding%20gift%20with%20Islamic%20calligraphy%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20elegant%20presentation&width=300&height=200&seq=11&orientation=landscape" alt="Mahar Wayang" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Mahar Wayang</h3>
                        <p class="text-primary font-semibold">IDR 789.000</p>
                        <a href="#" class="mt-3 inline-block text-primary hover:underline">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-16 px-6 bg-gray-50">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">Apa Kata Mereka</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="flex text-primary">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Mahar akrilik yang saya pesan sangat indah dan detail. Pasangan saya sangat menyukainya. Terima kasih atas pelayanan yang luar biasa!"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold">A</div>
                        <div class="ml-3">
                            <h4 class="font-semibold">Ahmad Fauzi</h4>
                            <p class="text-sm text-gray-500">Jakarta</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="flex text-primary">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Desain mahar kayu yang sangat unik dan berkualitas. Pengiriman cepat dan aman. Sangat merekomendasikan untuk momen spesial pernikahan."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold">S</div>
                        <div class="ml-3">
                            <h4 class="font-semibold">Siti Nurhaliza</h4>
                            <p class="text-sm text-gray-500">Bandung</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="flex text-primary">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-half-fill"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Mahar emas yang saya pesan menjadi pusat perhatian di acara pernikahan kami. Kualitasnya luar biasa dan pelayanan konsultasi desainnya sangat membantu."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold">R</div>
                        <div class="ml-3">
                            <h4 class="font-semibold">Rudi Hartono</h4>
                            <p class="text-sm text-gray-500">Surabaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-6 bg-primary bg-opacity-10">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Siap Memesan Mahar Kustom?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-8">Buat momen pernikahan Anda lebih berkesan dengan mahar kustom yang dirancang khusus sesuai keinginan. Konsultasikan ide Anda sekarang!</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="bg-primary text-white px-8 py-3 rounded-button inline-flex items-center justify-center whitespace-nowrap hover:bg-opacity-90 transition">
                    <div class="w-5 h-5 flex items-center justify-center mr-2">
                        <i class="ri-whatsapp-line"></i>
                    </div>
                    Hubungi via WhatsApp
                </a>
                <a href="#" class="bg-white border border-primary text-primary px-8 py-3 rounded-button inline-flex items-center justify-center whitespace-nowrap hover:bg-primary hover:text-white transition">
                    <div class="w-5 h-5 flex items-center justify-center mr-2">
                        <i class="ri-gallery-line"></i>
                    </div>
                    Lihat Katalog
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-primary rounded flex items-center justify-center">
                            <span class="font-['Pacifico'] text-white text-xl">logo</span>
                        </div>
                        <span class="ml-3 text-xl font-bold">Mahar Kustom</span>
                    </div>
                    <p class="text-gray-400 mb-6">Hadirkan kenangan indah pernikahan Anda dengan mahar kustom yang dirancang khusus sesuai keinginan.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-instagram-fill"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-6">Produk Kami</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Mahar Kayu</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Mahar Akrilik</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Mahar Emas</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Mahar Jam</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Mahar Alat Sholat</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Mahar Perhiasan</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-6">Informasi</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Cara Pemesanan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Pengiriman</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-6">Kontak Kami</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <div class="w-5 h-5 flex items-center justify-center mt-1 mr-3">
                                <i class="ri-map-pin-line"></i>
                            </div>
                            <span class="text-gray-400">Jl. Mawar No. 123, Kota Jambi, Indonesia</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-phone-line"></i>
                            </div>
                            <span class="text-gray-400">+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-mail-line"></i>
                            </div>
                            <span class="text-gray-400">info@maharkustom.com</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-time-line"></i>
                            </div>
                            <span class="text-gray-400">Senin - Sabtu: 08.00 - 17.00</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-gray-800 text-center">
                <p class="text-gray-400">All right reserved by SESERAHAN MAHAR JAMBI 2025</p>
                <div class="flex justify-center space-x-6 mt-4">
                    <a href="#" class="text-gray-400 hover:text-primary transition">ABOUT US</a>
                    <a href="#" class="text-gray-400 hover:text-primary transition">HOW TO</a>
                    <a href="#" class="text-gray-400 hover:text-primary transition">CONTACT US</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>
