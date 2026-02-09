<x-frontend-layout>
    <!-- Hero Section -->
    <section class="relative py-20 bg-white">
        <div class="section-container">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span
                    class="text-red-600 font-extrabold text-sm uppercase tracking-[0.3em] mb-4 block">Dokumentasi</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">Galeri Kegiatan</h1>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Momen-momen berharga dari setiap langkah dan kontribusi kami untuk masyarakat.
                </p>
            </div>

            @if ($galleries->isEmpty())
                <div class="text-center py-20 bg-gray-50 rounded-[2rem] border-2 border-dashed border-gray-200">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <p class="text-gray-500 font-medium text-lg">Belum ada foto yang diunggah.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($galleries as $gallery)
                        <a data-fslightbox="gallery" href="{{ asset('storage/' . $gallery->image_path) }}"
                            class="group relative aspect-square overflow-hidden rounded-2xl bg-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 block">
                            <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}"
                                loading="lazy"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.0.9/index.min.js"></script>
    @endpush
</x-frontend-layout>
