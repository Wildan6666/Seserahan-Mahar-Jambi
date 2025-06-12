<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 text-sm flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-60 bg-gray-700 text-white flex flex-col shadow-xl" data-aos="fade-right">
        <div class="p-6 border-b border-gray-700 flex items-center gap-2">
            <span class="text-2xl">🛠️</span>
            <h2 class="text-xl font-bold tracking-wide">Admin Panel</h2>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ url('/dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-800 transition-all @if(request()->is('dashboard')) bg-gray-800 @endif">
                📊 <span>Dashboard</span>
            </a>
            <a href="{{ url('/admin/usermanajemen') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-800 transition-all @if(request()->is('admin/usermanajemen')) bg-gray-800 @endif">
                👤 <span>Manajemen User</span>
            </a>
            <a href="{{ url('/admin/products') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-800 transition-all @if(request()->is('admin/products')) bg-gray-800 @endif">
                📦 <span>Produk</span>
            </a>
            <a href="{{ url('/orders') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-800 transition-all @if(request()->is('orders')) bg-gray-800 @endif">
                🛒 <span>Pesanan</span>
            </a>

            <form action="{{ url('/logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-left hover:bg-red-600 bg-red-500 transition-all">
                    🚪 <span>Logout</span>
                </button>
            </form>
        </nav>

        <div class="text-center text-xs text-gray-500 p-4 border-t border-gray-700">
            &copy; {{ date('Y') }} Mahar Jambi
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-white shadow-inner rounded-lg m-4 p-6 overflow-auto" data-aos="fade-up">
        @yield('content')
    </main>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 600,
        });
    </script>
</body>
</html>
