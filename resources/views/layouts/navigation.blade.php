<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-40 transition-all duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center group">
                        <div
                            class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center shadow-lg shadow-red-600/20 mr-2.5 transition-transform group-hover:scale-105">
                            <span class="text-white font-bold text-xs">P</span>
                        </div>
                        <span class="text-xl font-bold tracking-tighter text-gray-900">
                            ADMIN<span class="text-red-600 uppercase">Panel</span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm border-b-2 font-semibold">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')"
                        class="text-sm border-b-2 font-semibold text-gray-500 hover:text-red-600 transition-colors">
                        {{ __('Berita') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.galleries.index')" :active="request()->routeIs('admin.galleries.*')"
                        class="text-sm border-b-2 font-semibold text-gray-500 hover:text-red-600 transition-colors">
                        {{ __('File Gallery') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="h-8 w-px bg-gray-100 mx-4"></div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-semibold rounded-xl text-gray-600 bg-gray-50 hover:bg-gray-100 hover:text-gray-900 transition-all duration-200">
                            <div
                                class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center mr-2.5 border border-red-100">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1.5 opacity-40">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-50">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Account Status</p>
                            <p class="text-xs font-semibold text-green-600 mt-0.5">Administrator</p>
                        </div>
                        <x-dropdown-link :href="route('profile.edit')" class="text-xs font-medium py-3">
                            {{ __('Profil Akun') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                class="text-xs font-medium py-3 text-red-600 hover:bg-red-50"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2.5 rounded-xl text-gray-500 hover:text-red-600 hover:bg-red-50 transition-all duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        class="md:hidden bg-white border-b border-gray-100 overflow-hidden">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-xl px-4 py-3 font-semibold">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')" class="rounded-xl px-4 py-3 font-semibold">
                {{ __('Berita') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.galleries.index')" :active="request()->routeIs('admin.galleries.*')" class="rounded-xl px-4 py-3 font-semibold">
                {{ __('File Gallery') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-100 px-4 bg-gray-50/50">
            <div class="flex items-center px-4 py-3">
                <div
                    class="w-10 h-10 rounded-full bg-red-600 text-white flex items-center justify-center font-bold mr-3 shadow-lg shadow-red-600/20">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-bold text-base text-gray-900">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1 mb-4">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl px-4 font-semibold text-gray-600">
                    {{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        class="rounded-xl px-4 font-semibold text-red-600 active:bg-red-50"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
