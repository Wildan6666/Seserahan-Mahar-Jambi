<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="flex min-h-screen bg-gray-100 text-gray-800">

    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-gray-800 to-gray-900 text-white shadow-lg flex flex-col" data-aos="fade-right">
        <div class="p-6 border-b border-gray-700">
            <h2 class="text-2xl font-extrabold tracking-wide">🛠️ Admin Panel</h2>
        </div>
        <nav class="flex-1 px-4 py-4 space-y-2">
            <a href="{{ url('/dashboard') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700 transition-all duration-150">📊 Dashboard</a>
            <a href="{{ url('/users') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700 transition-all duration-150">👤 Manajemen User</a>
            <a href="{{ url('/products') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700 transition-all duration-150">📦 Produk</a>
            <a href="{{ url('/orders') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700 transition-all duration-150">🛒 Pesanan Masuk</a>
            <form action="{{ url('/logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded-md hover:bg-gray-700 transition-all duration-150">
                    🚪 Logout
                </button>
            </form>
        </nav>
        <div class="text-center text-xs p-4 text-gray-500 border-t border-gray-700">
            &copy; {{ date('Y') }} Mahar Jambi
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6" data-aos="fade-up">
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
