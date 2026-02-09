<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="h-full antialiased font-sans">
    <div
        class="min-h-screen flex flex-col items-center justify-center p-6 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-from)_0%,_transparent_50%),_radial-gradient(circle_at_bottom_left,_var(--tw-gradient-to)_0%,_transparent_50%)] from-indigo-50/50 via-white to-sky-50/50">
        <div class="w-full max-w-md">
            <div class="flex flex-col items-center mb-10">
                <a href="/" class="group">
                    <x-application-logo
                        class="w-16 h-16 fill-current text-indigo-600 transition-transform duration-300 group-hover:scale-110" />
                </a>
                <h1 class="mt-4 text-2xl font-bold tracking-tight text-gray-900">{{ config('app.name', 'Laravel') }}
                </h1>
            </div>

            <div
                class="bg-white/80 backdrop-blur-xl border border-white/20 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden rounded-3xl p-8 sm:p-10">
                {{ $slot }}
            </div>

            <p class="mt-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>
