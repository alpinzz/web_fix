<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $pageTitle = '';
        if (request()->routeIs('profile')) {
            $pageTitle = '-Profil';
        } elseif (request()->routeIs('structure')) {
            $pageTitle = '-Struktur';
        } elseif (request()->routeIs('news')) {
            $pageTitle = '-Berita';
        } elseif (request()->routeIs('news.detail') && isset($post)) {
            $pageTitle = '-' . $post->title;
        } elseif (request()->routeIs('gallery')) {
            $pageTitle = '-Galeri';
        } elseif (View::hasSection('title')) {
            $pageTitle = '-' . View::getSection('title');
        }
    @endphp
    <title>PK AR Fachruddin{{ $pageTitle }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900 bg-gray-50 flex flex-col min-h-full">
    <!-- Navbar -->
    <nav x-data="{ open: false, atTop: true }" @scroll.window="atTop = (window.pageYOffset > 10 ? false : true)"
        :class="{ 'py-4 bg-white/80 backdrop-blur-xl shadow-lg': !atTop, 'py-6 bg-transparent': atTop }"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="{{ route('home') }}"
                        class="flex items-center group transition-transform duration-300 hover:scale-105">
                        <div
                            class="w-10 h-10 bg-red-600 rounded-xl flex items-center justify-center shadow-lg shadow-red-600/20 mr-3">
                            <!-- Simple Icon Placeholder if x-application-logo is too big -->
                            <span class="text-white font-bold text-xl leading-none">P</span>
                        </div>
                        <span class="text-2xl font-extrabold tracking-tighter text-gray-900">
                            PK<span class="text-red-600">ARF</span>
                        </span>
                    </a>

                    <!-- Desktop Nav -->
                    <div class="hidden md:ml-12 md:flex md:space-x-8">
                        @php $navLinkColors = "text-gray-600 hover:text-red-600 font-medium transition-colors duration-200"; @endphp
                        <a href="{{ route('home') }}"
                            class="{{ request()->routeIs('home') ? 'text-red-600 font-bold' : $navLinkColors }}">Home</a>
                        <a href="{{ route('profile') }}"
                            class="{{ request()->routeIs('profile') ? 'text-red-600 font-bold' : $navLinkColors }}">Profil</a>
                        <a href="{{ route('structure') }}"
                            class="{{ request()->routeIs('structure') ? 'text-red-600 font-bold' : $navLinkColors }}">Struktur</a>
                        <a href="{{ route('news') }}"
                            class="{{ request()->routeIs('news*') ? 'text-red-600 font-bold' : $navLinkColors }}">Berita</a>
                        <a href="{{ route('gallery') }}"
                            class="{{ request()->routeIs('gallery') ? 'text-red-600 font-bold' : $navLinkColors }}">Galeri</a>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="btn-premium px-6 py-2.5 text-sm uppercase tracking-widest leading-none">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-gray-600 hover:text-gray-900 font-semibold px-4 transition-colors">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="btn-premium px-6 py-2.5 text-sm uppercase tracking-widest leading-none">Join Us</a>
                        @endif
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="open = ! open"
                        class="p-2.5 rounded-2xl text-gray-600 hover:text-red-600 hover:bg-red-50 focus:outline-none transition-all duration-300">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="md:hidden glass-card mx-6 mt-2 overflow-hidden border-gray-200/50">
            <div class="p-4 space-y-2">
                <a href="{{ route('home') }}"
                    class="block px-4 py-3 rounded-2xl text-base font-semibold {{ request()->routeIs('home') ? 'bg-red-50 text-red-600' : 'text-gray-600 hover:bg-gray-50' }}">Home</a>
                <a href="{{ route('profile') }}"
                    class="block px-4 py-3 rounded-2xl text-base font-semibold {{ request()->routeIs('profile') ? 'bg-red-50 text-red-600' : 'text-gray-600 hover:bg-gray-50' }}">Profil</a>
                <a href="{{ route('structure') }}"
                    class="block px-4 py-3 rounded-2xl text-base font-semibold {{ request()->routeIs('structure') ? 'bg-red-50 text-red-600' : 'text-gray-600 hover:bg-gray-50' }}">Struktur</a>
                <a href="{{ route('news') }}"
                    class="block px-4 py-3 rounded-2xl text-base font-semibold {{ request()->routeIs('news*') ? 'bg-red-50 text-red-600' : 'text-gray-600 hover:bg-gray-50' }}">Berita</a>
                <a href="{{ route('gallery') }}"
                    class="block px-4 py-3 rounded-2xl text-base font-semibold {{ request()->routeIs('gallery') ? 'bg-red-50 text-red-600' : 'text-gray-600 hover:bg-gray-50' }}">Galeri</a>

                <hr class="border-gray-100 my-2">

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="block w-full text-center py-4 bg-red-600 text-white font-bold rounded-2xl shadow-lg shadow-red-600/20">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="block text-center px-4 py-3 text-gray-600 font-semibold mb-2">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="block w-full text-center py-4 bg-red-600 text-white font-bold rounded-2xl shadow-lg shadow-red-600/20">Sign
                            Up</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 pt-20 pb-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <!-- Branding -->
                <div class="col-span-1 md:col-span-2">
                    <a href="{{ route('home') }}" class="flex items-center mb-6">
                        <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center mr-2.5">
                            <span class="text-white font-bold text-sm">P</span>
                        </div>
                        <span class="text-xl font-extrabold tracking-tighter text-gray-900 uppercase">PK<span
                                class="text-red-600">ARF</span></span>
                    </a>
                    <p class="text-gray-500 max-w-sm leading-relaxed mb-8">
                        Pimpinan Komisariat AR Fachruddin. Berdedikasi untuk memberikan kontribusi nyata melalui
                        program-program inovatif dan kolaboratif bagi kemajuan bersama.
                    </p>
                    <!-- Social Placeholder -->
                    <div class="flex space-x-4">

                        <a href="https://www.instagram.com/pk_arfachruddinumpwrj/"
                            class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-600 transition-all duration-300">
                            <span class="sr-only">Social</span>

                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="http://www.youtube.com/@pkarfachruddin"
                            class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-600 transition-all duration-300">
                            <span class="sr-only">Social</span>

                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-600 transition-all duration-300">
                            <span class="sr-only">Social</span>

                            <i class="fa-brands fa-tiktok"></i>
                        </a>

                    </div>
                </div>

                <!-- Links 1 -->
                <div>
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-6">Navigasi</h4>
                    <ul class="space-y-4">
                        <li><a href="{{ route('home') }}"
                                class="text-gray-500 hover:text-red-600 transition-colors">Beranda</a></li>
                        <li><a href="{{ route('profile') }}"
                                class="text-gray-500 hover:text-red-600 transition-colors">Tentang Kami</a></li>
                        <li><a href="{{ route('structure') }}"
                                class="text-gray-500 hover:text-red-600 transition-colors">Struktur Organisasi</a></li>
                        <li><a href="{{ route('news') }}"
                                class="text-gray-500 hover:text-red-600 transition-colors">Berita Terbaru</a></li>
                        <li><a href="{{ route('gallery') }}"
                                class="text-gray-500 hover:text-red-600 transition-colors">Galeri Kegiatan</a></li>
                    </ul>
                </div>

                <!-- Links 2 (Contact Removed -> Placeholder for other info) -->
                {{-- <div>
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-6">Kontribusi</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-500 hover:text-red-600 transition-colors">Donasi</a>
                        </li>
                        <li><a href="#" class="text-gray-500 hover:text-red-600 transition-colors">Relawan</a>
                        </li>
                        <li><a href="#" class="text-gray-500 hover:text-red-600 transition-colors">Kemitraan</a>
                        </li>
                    </ul>
                </div> --}}
            </div>

            <div
                class="pt-12 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} PK AR Fachruddin. All rights reserved.</p>
                {{-- <div class="mt-4 md:mt-0 flex space-x-8">
                    <a href="#" class="hover:text-gray-600 transition">Privacy Policy</a>
                    <a href="#" class="hover:text-gray-600 transition">Terms of Service</a>
                </div> --}}
            </div>
        </div>
    </footer>
    @stack('scripts')
</body>

</html>
