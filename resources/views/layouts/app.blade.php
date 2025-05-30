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

        <!-- Optional Footer -->
        <footer class="bg-white border-t mt-8 py-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Mahar Jambi. All rights reserved.
        </footer>
    </div>
</body>
</html>
