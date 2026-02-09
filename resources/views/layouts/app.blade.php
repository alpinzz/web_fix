<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin Panel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="font-sans antialiased text-gray-900 h-full">
    <div class="min-h-screen pb-12">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header
                class="bg-white/70 backdrop-blur-md border-b border-gray-100 sticky top-16 z-30 transition-all duration-300">
                <div class="max-w-7xl mx-auto py-5 px-6 sm:px-8">
                    <div class="flex items-center justify-between">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="mt-8">
            <div class="max-w-7xl mx-auto px-6 sm:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
    @stack('scripts')
</body>

</html>
