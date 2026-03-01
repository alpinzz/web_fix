<x-frontend-layout>
    <!-- Page Header -->
    <section class="pt-32 pb-20 bg-white relative overflow-hidden">
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-red-50 rounded-full blur-3xl opacity-50"></div>
        </div>

        <div class="section-container relative z-10 text-center">
            <div
                class="inline-flex items-center justify-center p-4 bg-gray-50 rounded-[2rem] shadow-sm mb-10 border border-gray-100 animate-fade-in">
                @if ($profile->logo)
                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="{{ $profile->name }}"
                        class="h-24 w-24 object-contain">
                @else
                    <div
                        class="h-24 w-24 bg-red-600 rounded-2xl flex items-center justify-center text-white text-4xl font-black">
                        AR</div>
                @endif
            </div>
            <h1
                class="text-4xl md:text-6xl font-extrabold text-gray-900 tracking-tight leading-tight mb-6 animate-fade-in delay-100">
                Tentang <span class="text-red-600 italic">Organisasi</span> Kami
            </h1>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto animate-fade-in delay-200">
                Mengenal lebih dekat identitas, sejarah, visi, dan misi perjuangan PK AR Fachruddin.
            </p>
        </div>
    </section>

    <!-- History -->
    <section class="py-24 bg-gray-50">
        <div class="section-container">
            @if ($profile->history)
                <div class="glass-card bg-white p-12 md:p-20 shadow-premium border-gray-100/50">
                    <div class="flex flex-col md:flex-row gap-16">
                        <div class="md:w-1/3">
                            <span
                                class="text-red-600 font-extrabold text-sm uppercase tracking-[0.3em] mb-4 block">Legacy</span>
                            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-8">Jejak Langkah &
                                Sejarah</h2>
                            <div class="w-20 h-1.5 bg-red-600 rounded-full"></div>
                        </div>
                        <div class="md:w-2/3">
                            <div class="prose prose-lg prose-red text-gray-600 leading-relaxed max-w-none">
                                {!! nl2br(e($profile->history)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="py-32 bg-white">
        <div class="section-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Vision -->
                @if ($profile->vision)
                    <div
                        class="group p-12 rounded-[3rem] bg-gray-900 text-white shadow-2xl relative overflow-hidden transition-all duration-500 hover:-translate-y-2">
                        <div
                            class="absolute top-0 right-0 p-12 opacity-10 group-hover:scale-110 transition duration-700">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                            </svg>
                        </div>
                        <div class="relative z-10">
                            <span
                                class="inline-block px-4 py-1.5 rounded-full bg-red-600/20 text-red-500 text-[10px] font-bold uppercase tracking-widest mb-8 border border-red-600/30">The
                                Goal</span>
                            <h3 class="text-4xl font-extrabold mb-8 italic">Visi</h3>
                            <p class="text-xl text-gray-300 leading-relaxed font-medium">
                                "{{ $profile->vision }}"
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Mission -->
                @if ($profile->mission)
                    <div
                        class="p-12 rounded-[3rem] bg-red-600 text-white shadow-2xl relative overflow-hidden transition-all duration-500 hover:-translate-y-2 shadow-red-600/20">
                        <div class="relative z-10">
                            <span
                                class="inline-block px-4 py-1.5 rounded-full bg-white/20 text-white text-[10px] font-bold uppercase tracking-widest mb-8 border border-white/30">The
                                Action</span>
                            <h3 class="text-4xl font-extrabold mb-8 italic">Misi</h3>
                            <ul class="space-y-6">
                                @php
                                    $missions = is_string($profile->mission)
                                        ? json_decode($profile->mission, true) ?? [$profile->mission]
                                        : $profile->mission;
                                @endphp
                                @foreach ((array) $missions as $mission)
                                    <li class="flex items-start">
                                        <div
                                            class="mt-1.5 mr-4 w-6 h-6 rounded-full bg-white/20 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <span class="text-lg font-semibold leading-snug">{{ $mission }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <style>
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
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
    </style>
</x-frontend-layout>
