<x-frontend-layout>
    <!-- Hero Section -->
    <div class="relative bg-red-900 py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div
                class="absolute transform -rotate-45 -left-20 -top-20 w-96 h-96 bg-white rounded-full mix-blend-overlay">
            </div>
            <div
                class="absolute transform rotate-45 -right-20 -bottom-20 w-96 h-96 bg-white rounded-full mix-blend-overlay">
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 tracking-tight">Struktur Organisasi</h1>
            <p class="text-red-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">Mengenal tim berdedikasi yang
                menjadi motor penggerak visi dan misi PK AR Fachruddin.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">

        <!-- BPH Section -->
        @if ($bph->count() > 0)
            <div class="mb-24">
                <div class="flex flex-col items-center mb-16">
                    <span
                        class="px-4 py-1.5 bg-red-50 text-red-600 text-xs font-bold uppercase tracking-widest rounded-full mb-4">Core
                        Team</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Badan Pengurus Harian</h2>
                    <div class="w-20 h-1.5 bg-red-500 mt-6 rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-16">
                    @foreach ($bph as $member)
                        <x-member-card :member="$member" />
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Divisions Section -->
        @foreach ($divisions as $divisionName => $members)
            @if ($divisionName && $divisionName !== 'BPH')
                <div class="mb-24">
                    <div class="flex flex-col items-center mb-16">
                        <span
                            class="px-4 py-1.5 bg-gray-100 text-gray-600 text-xs font-bold uppercase tracking-widest rounded-full mb-4">Division</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $divisionName }}</h2>
                        <div class="w-12 h-1 bg-gray-300 mt-4 rounded-full"></div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach ($members as $member)
                            <x-member-card :member="$member" />
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

        @if ($bph->isEmpty() && $divisions->isEmpty())
            <div class="text-center py-32 bg-white rounded-3xl border border-dashed border-gray-200 shadow-sm">
                <div class="inline-block p-6 rounded-3xl bg-red-50 text-red-500 mb-6">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">Belum ada data struktur organisasi</h3>
                <p class="text-gray-500 mt-3 max-w-sm mx-auto">Kami sedang mempersiapkan data anggota untuk segera
                    ditampilkan di halaman ini.</p>
            </div>
        @endif

    </div>
</x-frontend-layout>
