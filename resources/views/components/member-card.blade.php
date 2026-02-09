@props(['member'])

<div
    class="group relative bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_50px_rgba(0,0,0,0.1)] transition-all duration-500 flex flex-col h-full transform hover:-translate-y-2">
    <!-- Image Wrapper -->
    <div class="relative aspect-[4/5] overflow-hidden">
        @if ($member->photo)
            <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        @else
            <div class="flex items-center justify-center h-full bg-linear-to-br from-gray-50 to-gray-200 text-gray-300">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        @endif

        <!-- Overlay Gradient -->
        <div
            class="absolute inset-0 bg-linear-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
        </div>
    </div>

    <!-- Content -->
    <div class="p-6 flex-grow text-center">
        <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition-colors duration-300">
            {{ $member->name }}</h3>
        <p class="text-sm font-semibold text-red-500 mt-1 uppercase tracking-wider">{{ $member->position }}</p>

        @if ($member->bio)
            <div class="mt-4 pt-4 border-t border-gray-100">
                <p class="text-gray-500 text-sm leading-relaxed italic line-clamp-3">
                    "{{ $member->bio }}"
                </p>
            </div>
        @endif
    </div>

    <!-- Decorative Bottom Bar -->
    <div class="h-1.5 w-0 bg-red-500 group-hover:w-full transition-all duration-500"></div>
</div>
