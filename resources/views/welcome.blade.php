<x-frontend-layout>
    <!-- Hero Section -->
    <section class="relative min-h-[90vh] flex items-center pt-20 overflow-hidden bg-background">
        <!-- Abstract Background Elements -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
            <div class="absolute top-[-10%] right-[-10%] w-[50%] h-[50%] bg-red-600/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-[40%] h-[40%] bg-red-600/10 rounded-full blur-3xl"></div>
            <div class="absolute top-[20%] left-[10%] w-[30%] h-[30%] bg-gray-200/40 rounded-full blur-3xl"></div>
        </div>

        <div class="section-container relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="animate-fade-in order-2 lg:order-1">
                <span
                    class="inline-flex items-center px-4 py-1.5 rounded-full bg-red-50 text-red-600 text-xs font-bold uppercase tracking-[0.2em] mb-8 border border-red-100">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-600 mr-2 pulse"></span>
                    Halaman Resmi
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 leading-[1.1] mb-8 tracking-tight">
                    Bergerak <br>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-800 uppercase italic">Berkontribusi</span><br>
                    Untuk Bangsa
                </h1>
                <p class="text-xl text-gray-600 leading-relaxed mb-10 max-w-xl">
                    {{ config('app.name') }} berdedikasi membangun sinergi melalui inovasi, kolaborasi, dan aksi nyata
                    demi kemajuan masyarakat.
                </p>
                <div class="flex flex-col sm:flex-row gap-5">
                    <a href="{{ route('profile') }}" class="btn-premium flex items-center justify-center">
                        Jelajahi Profil
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="{{ route('news') }}"
                        class="px-8 py-4 bg-white hover:bg-gray-50 text-gray-900 border border-gray-200 font-semibold rounded-2xl shadow-sm transition-all duration-300 flex items-center justify-center">
                        Lihat Kegiatan
                    </a>
                </div>
            </div>

            <div class="relative order-1 lg:order-2 flex justify-center">
                <!-- Modern Floating Image/Logo Setup -->
                <div
                    class="relative w-full max-w-md aspect-square bg-white rounded-[3rem] shadow-premium flex items-center justify-center p-12 lg:scale-110 transition-transform duration-500 hover:scale-115">
                    @if (isset($profile) && $profile->logo)
                        <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo"
                            class="w-full h-full object-contain filter drop-shadow-2xl">
                    @else
                        <div
                            class="w-full h-full bg-linear-to-br from-red-600 to-red-800 rounded-3xl flex items-center justify-center">
                            <span class="text-white text-9xl font-black">AR</span>
                        </div>
                    @endif

                    <!-- Stats Floaters -->
                    <div class="absolute -top-6 -right-6 glass-card p-5 animate-bounce-slow">
                        <span class="block text-2xl font-bold text-red-600 leading-none">100+</span>
                        <span class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-1">Anggota
                            Aktif</span>
                    </div>
                    <div class="absolute -bottom-10 -left-6 glass-card p-5 animate-bounce-slow delay-700">
                        <span class="block text-2xl font-bold text-gray-900 leading-none">50+</span>
                        <span class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-1">Program
                            Berjalan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Brief Profile Section -->
    <section class="py-32 bg-white">
        <div class="section-container">
            @if (isset($profile) && $profile)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                    <div class="relative">
                        <div class="aspect-4/3 rounded-[2.5rem] overflow-hidden shadow-2xl relative group">
                            @if ($profile->logo)
                                <img src="{{ asset('storage/' . $profile->logo) }}" alt="Identity"
                                    class="w-full h-full object-contain p-12 bg-gray-50 group-hover:scale-110 transition duration-700">
                            @else
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=1200"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @endif
                            <div
                                class="absolute inset-0 pointer-events-none ring-1 ring-inset ring-black/5 rounded-[2.5rem]">
                            </div>
                        </div>
                        <!-- Floating Badge -->
                        <div
                            class="absolute bottom-8 right-8 glass-card bg-red-600 py-3 px-6 text-white font-bold leading-none shadow-xl border-none">
                            Sejak {{ date('Y', strtotime($profile->created_at)) }}
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="space-y-4">
                            <span class="text-red-600 font-extrabold text-sm uppercase tracking-[0.3em]">Identity</span>
                            <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight">Misi Kami Adalah
                                Memberikan Dampak Nyata</h2>
                        </div>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            {{ Str::limit($profile->history, 350) }}
                        </p>
                        <div class="pt-6">
                            <a href="{{ route('profile') }}"
                                class="group inline-flex items-center text-gray-900 font-bold text-lg hover:text-red-600 transition-colors">
                                Baca Cerita Kami
                                <span
                                    class="ml-2 w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center group-hover:bg-red-600 group-hover:border-red-600 group-hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Latest News -->
    <section class="py-32 bg-gray-50 overflow-hidden relative">
        <div class="section-container relative z-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-20 gap-8">
                <div class="max-w-2xl">
                    <span
                        class="text-red-600 font-extrabold text-sm uppercase tracking-[0.3em] mb-4 block">Highlights</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight">Kabar & Aktivitas
                        Terbaru</h2>
                </div>
                <div>
                    <a href="{{ route('news') }}"
                        class="inline-flex items-center font-bold text-gray-900 hover:text-red-600 transition group">
                        Lihat Seluruh Arsip
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($posts as $post)
                    <article
                        class="group bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl hover:shadow-gray-200/50 transition-all duration-500 relative flex flex-col h-full transform hover:-translate-y-2">
                        <div class="aspect-video relative overflow-hidden">
                            @php $imageUrl = $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1585829365295-ab7cd400c167?auto=format&fit=crop&q=80&w=800'; @endphp
                            <img src="{{ $imageUrl }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-x-4 top-4 flex justify-between items-start pointer-events-none">
                                <span
                                    class="bg-red-600 text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 rounded-lg shadow-lg">New
                                    Info</span>
                                <span
                                    class="bg-white/80 backdrop-blur-md text-gray-900 text-[10px] font-bold px-3 py-1.5 rounded-lg border border-white/40 shadow-sm">{{ $post->published_at ? $post->published_at->format('d M') : $post->created_at->format('d M') }}</span>
                            </div>
                        </div>
                        <div class="p-8 flex-grow flex flex-col">
                            <h3
                                class="text-xl font-bold text-gray-900 line-clamp-2 mb-4 group-hover:text-red-600 transition-colors duration-300">
                                <a href="{{ route('news.detail', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 mb-6 flex-grow">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>
                            <div class="pt-6 border-t border-gray-50 mt-auto">
                                <a href="{{ route('news.detail', $post->slug) }}"
                                    class="inline-flex items-center text-sm font-bold text-red-600 hover:text-red-700">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div
                        class="col-span-full py-20 bg-white rounded-[2rem] border-2 border-dashed border-gray-100 flex flex-col items-center">
                        <p class="text-gray-400 font-medium">Belum ada berita untuk dibagikan saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Decoration side text -->
        <span
            class="hidden xl:block absolute -right-20 top-1/2 -translate-y-1/2 text-[15rem] font-black text-gray-900/5 select-none pointer-events-none uppercase tracking-tighter transform rotate-90">JOURNAL</span>
    </section>

    <!-- Video Profile Section -->
    <section class="py-32 bg-white relative overflow-hidden">
        <div class="section-container relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16 space-y-4">
                    <span class="text-red-600 font-extrabold text-sm uppercase tracking-[0.3em]">Cinematic</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-6">Visualisasi Visi Kami</h2>
                </div>

                <div class="relative group">
                    <!-- Frame -->
                    <div
                        class="absolute -inset-4 bg-linear-to-tr from-red-600/20 to-gray-200/20 rounded-[3rem] blur-2xl group-hover:from-red-600/40 transition duration-500">
                    </div>

                    <div
                        class="relative aspect-video glass-card bg-gray-900 border-gray-800 shadow-2xl overflow-hidden group">
                        @if (isset($profile) && $profile->video_url)
                            @php
                                $video_id = '';
                                parse_str(parse_url($profile->video_url, PHP_URL_QUERY), $params);
                                if (isset($params['v'])) {
                                    $video_id = $params['v'];
                                } else {
                                    $path = parse_url($profile->video_url, PHP_URL_PATH);
                                    $video_id = substr($path, 1);
                                }
                            @endphp
                            @if ($video_id)
                                <iframe
                                    class="absolute inset-0 w-full h-full opacity-90 group-hover:opacity-100 transition duration-500"
                                    src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&showinfo=0&autoplay=0"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            @else
                                <div class="absolute inset-0 flex items-center justify-center text-gray-500">
                                    <p class="font-bold flex items-center"><svg class="w-6 h-6 mr-2" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg> Invalid Video Source</p>
                                </div>
                            @endif
                        @else
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-gray-900 transition duration-500 group-hover:bg-gray-800">
                                <p
                                    class="text-gray-500 font-bold uppercase tracking-widest flex flex-col items-center">
                                    <svg class="w-16 h-16 mb-4 opacity-20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7 6v12l10-6z" />
                                    </svg>
                                    Video Profile Unavailable
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .pulse {
            animation: pulse-shadow 2s infinite;
        }

        @keyframes pulse-shadow {
            0% {
                box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(220, 38, 38, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(220, 38, 38, 0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }

        .animate-bounce-slow {
            animation: bounceSlow 3s ease-in-out infinite;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceSlow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }
    </style>
</x-frontend-layout>
