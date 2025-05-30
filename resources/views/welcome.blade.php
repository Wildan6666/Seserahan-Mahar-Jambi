<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mahar Jambi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-white text-gray-800 flex items-center justify-center min-h-screen px-4 py-8">
    <div class="w-full max-w-4xl text-center">
        <!-- Logo -->
        <div class="mb-8">
            <img src="{{ asset('images/mahar-logo.png') }}" alt="Mahar Jambi" class="mx-auto h-24">
        </div>

        <!-- Welcome Text -->
        <h1 class="text-3xl font-semibold text-gray-900 mb-4">Selamat Datang di Mahar Jambi</h1>
        <p class="text-lg text-gray-600 mb-8">
            Platform pemesanan mahar online dengan desain eksklusif dan pelayanan terbaik.
        </p>

        <!-- Call to Action -->
        <div class="flex justify-center gap-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-gray-900 text-white rounded hover:bg-gray-700 transition">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="px-6 py-2 border border-gray-300 rounded text-gray-800 hover:bg-gray-100 transition">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-6 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">Daftar</a>
                @endif
            @endauth
        </div>
    </div>
</body>

</html>
