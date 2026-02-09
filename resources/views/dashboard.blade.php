<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <span class="text-xs font-bold text-red-600 uppercase tracking-[0.2em] mb-1">Overview</span>
            <h2 class="font-extrabold text-3xl text-gray-900 leading-tight tracking-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="space-y-10 animate-fade-in">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Total News -->
            <div
                class="group glass-card p-1 bg-linear-to-br from-red-600 to-red-800 shadow-xl shadow-red-600/10 hover:shadow-red-600/20 transition-all duration-500 overflow-hidden relative">
                <div class="bg-white rounded-[1.4rem] p-8 h-full relative overflow-hidden">
                    <!-- Background Decoration -->
                    <div
                        class="absolute -right-4 -bottom-4 opacity-[0.03] group-hover:opacity-10 transition duration-500">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="p-3.5 rounded-2xl bg-red-50 text-red-600 border border-red-100 shadow-sm group-hover:scale-110 transition duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest bg-gray-50 px-3 py-1 rounded-full">Aggregated</span>
                    </div>
                    <div>
                        <p class="text-gray-500 font-bold text-xs uppercase tracking-widest mb-1">Total Berita</p>
                        <p class="text-4xl font-black text-gray-900 tracking-tighter">{{ $totalNews }}</p>
                    </div>
                </div>
            </div>

            <!-- Published -->
            <div
                class="group glass-card p-1 bg-gray-900 shadow-xl shadow-gray-900/10 hover:shadow-gray-900/20 transition-all duration-500 overflow-hidden relative">
                <div class="bg-white rounded-[1.4rem] p-8 h-full relative overflow-hidden">
                    <div
                        class="absolute -right-4 -bottom-4 opacity-[0.03] group-hover:opacity-10 transition duration-500">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="p-3.5 rounded-2xl bg-green-50 text-green-600 border border-green-100 shadow-sm group-hover:scale-110 transition duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span
                            class="text-[10px] font-bold text-green-600 uppercase tracking-widest bg-green-50 px-3 py-1 rounded-full">Live
                            Now</span>
                    </div>
                    <div>
                        <p class="text-gray-500 font-bold text-xs uppercase tracking-widest mb-1">Berita Published</p>
                        <p class="text-4xl font-black text-gray-900 tracking-tighter">{{ $publishedNews }}</p>
                    </div>
                </div>
            </div>

            <!-- Draft -->
            <div
                class="group glass-card p-8 bg-white border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-2xl transition-all duration-500 overflow-hidden relative">
                <div class="absolute -right-4 -bottom-4 opacity-[0.03] group-hover:opacity-10 transition duration-500">
                    <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>

                <div class="flex items-center justify-between mb-6 relative z-10">
                    <div
                        class="p-3.5 rounded-2xl bg-yellow-50 text-yellow-600 border border-yellow-100 shadow-sm group-hover:scale-110 transition duration-500">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-[10px] font-bold text-yellow-600 uppercase tracking-widest bg-yellow-50 px-3 py-1 rounded-full">Pending</span>
                </div>
                <div class="relative z-10">
                    <p class="text-gray-500 font-bold text-xs uppercase tracking-widest mb-1">Draft Berita</p>
                    <p class="text-4xl font-black text-gray-900 tracking-tighter">{{ $draftNews }}</p>
                </div>
            </div>
        </div>

        <!-- Recent News Table -->
        <div class="glass-card bg-white border border-gray-100 shadow-premium overflow-hidden">
            <div class="p-8 border-b border-gray-50 flex items-center justify-between bg-gray-50/50">
                <div class="flex items-center">
                    <div class="w-2 h-8 bg-red-600 rounded-full mr-4"></div>
                    <div>
                        <h3 class="text-xl font-black text-gray-900 tracking-tight">Berita Terbaru</h3>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mt-0.5">Quick Actions
                            Management</p>
                    </div>
                </div>
                <a href="{{ route('admin.posts.index') }}"
                    class="px-5 py-2.5 bg-white border border-gray-200 text-xs font-bold text-gray-600 rounded-xl hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-300 shadow-sm">
                    Lihat Penuh
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-white">
                            <th
                                class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-50">
                                Konten & Judul</th>
                            <th
                                class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-50">
                                Status Info</th>
                            <th
                                class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-50">
                                Timestamp</th>
                            <th
                                class="px-8 py-5 text-right text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-50">
                                Manajemen</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse ($latestPosts as $post)
                            <tr class="hover:bg-gray-50/50 transition duration-300 group">
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400 mr-4 group-hover:bg-red-50 group-hover:text-red-600 transition duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                        <span
                                            class="text-sm font-extrabold text-gray-900 tracking-tight">{{ Str::limit($post->title, 45) }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    @if ($post->is_published)
                                        <span
                                            class="inline-flex items-center px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-green-50 text-green-600 border border-green-100">
                                            <span class="w-1 h-1 rounded-full bg-green-600 mr-2"></span> Published
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-yellow-50 text-yellow-600 border border-yellow-100">
                                            <span class="w-1 h-1 rounded-full bg-yellow-600 mr-2"></span> Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-sm font-bold text-gray-400 tabular-nums">
                                    {{ $post->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-right">
                                    <a href="{{ route('admin.posts.edit', $post) }}"
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-gray-100 bg-white text-gray-500 hover:text-white hover:bg-gray-900 transition-all duration-300 shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-8 py-20 text-center">
                                    <p class="text-gray-400 font-bold uppercase tracking-widest text-xs">Belum ada
                                        konten tersedia</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Access / Menu -->
        <div class="glass-card bg-white border border-gray-100 p-10 shadow-premium">
            <h3 class="text-xl font-black text-gray-900 tracking-tight mb-8 flex items-center">
                <span
                    class="w-6 h-6 rounded-lg bg-gray-900 text-white flex items-center justify-center mr-3 text-[10px]">A</span>
                Panel Akses Cepat
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @php
                    $menus = [
                        [
                            'route' => 'admin.posts.index',
                            'label' => 'Kelola Berita',
                            'icon' =>
                                'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z',
                            'color' => 'bg-red-500 shadow-red-500/20',
                        ],
                        [
                            'route' => 'admin.organization-profile.edit',
                            'label' => 'Profil Org',
                            'icon' =>
                                'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                            'color' => 'bg-emerald-500 shadow-emerald-500/20',
                        ],
                        [
                            'route' => 'admin.members.index',
                            'label' => 'Struktur',
                            'icon' =>
                                'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                            'color' => 'bg-amber-500 shadow-amber-500/20',
                        ],
                        [
                            'route' => 'home',
                            'label' => 'Buka Web',
                            'icon' => 'M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14',
                            'color' => 'bg-indigo-500 shadow-indigo-500/20',
                            'blank' => true,
                        ],
                    ];
                @endphp

                @foreach ($menus as $menu)
                    <a href="{{ route($menu['route']) }}" {{ isset($menu['blank']) ? 'target="_blank"' : '' }}
                        class="group flex flex-col items-center p-8 bg-gray-50 rounded-[2rem] border-2 border-transparent hover:border-white hover:bg-white hover:shadow-2xl hover:shadow-gray-200 transition-all duration-500 text-center">
                        <div
                            class="w-16 h-16 {{ $menu['color'] }} rounded-[1.5rem] flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-6 transition duration-500 shadow-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="{{ $menu['icon'] }}"></path>
                            </svg>
                        </div>
                        <span class="font-extrabold text-gray-900 text-sm tracking-tight">{{ $menu['label'] }}</span>
                        <div
                            class="mt-2 w-1 h-1 rounded-full bg-gray-200 group-hover:w-8 group-hover:bg-red-600 transition-all duration-500">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</x-app-layout>
