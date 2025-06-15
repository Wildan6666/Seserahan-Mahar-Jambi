<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mahar Jambi') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Optional: Add Tailwind Config here if needed -->
</head>
<body class="font-sans antialiased bg-[#f8f9fa] text-gray-800">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Header -->
        @isset($header)
            <header class="bg-white shadow-md">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-semibold text-gray-700">{{ $header }}</h1>
                </div>
            </header>
        @endisset

        <!-- Main Content -->
        <main class="flex-1">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-slate-200 text-gray-700 py-8">
            <div class="max-w-7xl mx-auto px-6 sm:px-12">
                <!-- Footer Content Container -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-center sm:text-left">
                    <!-- Logo and Description Section -->
                    <div class="flex flex-col items-center sm:items-start">
                        <div class="flex items-center mb-4 justify-center sm:justify-start">
                            <div class="header-logo w-14 h-14 rounded-full bg-primary flex items-center justify-center">
                                <span class="font-['Pacifico'] text-white text-2xl">MS</span>
                            </div>
                            <span class="ml-2 font-bold text-gray-800 text-2xl">Mahar Seserahan Jambi</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Hadirkan kenangan indah pernikahan dengan mahar kustom.</p>
                    </div>

                    <!-- Product Links Section -->
                    <div class="flex flex-col">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Produk Unggulan</h3>
                        <ul class="space-y-2">
                            <li><a href="/katalog" class="text-gray-600 hover:text-primary transition text-sm">Mahar Kayu</a></li>
                            <li><a href="/katalog" class="text-gray-600 hover:text-primary transition text-sm">Mahar Akrilik</a></li>
                            <li><a href="/katalog" class="text-gray-600 hover:text-primary transition text-sm">Mahar Emas</a></li>
                        </ul>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="flex flex-col">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Kontak Kami</h3>
                        <div class="space-y-2">
                            <p class="text-gray-600 text-sm">Tangkit, Kec. Sungai Gelam, Kabupaten Muaro Jambi, Jambi 36138</p>
                            <p class="text-gray-600 text-sm">Telepon: +62 8136 7047 864</p>
                            <p class="text-gray-600 text-sm">Email: <a href="mailto:maharseserahanjambi@gmail.com" class="hover:text-primary">info@maharkustom.com</a></p>
                        </div>
                    </div>

                    <!-- Social Media Links Section -->
                    <div class="flex justify-center space-x-6 mt-6 sm:mt-0">
                        <a href="https://wa.me/+6281367047864" class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition" aria-label="WhatsApp">
                            <i class="ri-whatsapp-fill text-white text-2xl"></i>
                        </a>
                        <a href="https://www.instagram.com/maharseserahan_jambi?igsh=MThveWNnOWVnOW84cQ==" class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition" aria-label="Instagram">
                            <i class="ri-instagram-fill text-white text-2xl"></i>
                        </a>
                        <a href="mailto:maharseserahanjambi@gmail.com" class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition" aria-label="Email">
                            <i class="ri-mail-line text-white text-2xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Copyright Section -->
                <div class="pt-6 border-t border-gray-300 text-center mt-8">
                    <p class="text-gray-600 text-sm">&copy; {{ date('Y') }} Mahar Seserahan Jambi. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
