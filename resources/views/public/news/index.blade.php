<x-frontend-layout>
    <!-- Header -->
    <section class="pt-32 pb-20 bg-white relative overflow-hidden">
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute bottom-0 left-0 w-1/3 h-1/3 bg-gray-50 rounded-full blur-3xl"></div>
        </div>
        <div class="section-container relative z-10 text-center">
            <span class="text-red-600 font-extrabold text-sm uppercase tracking-[0.3em] mb-4 block">Archive</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 tracking-tight leading-tight mb-6">
                Berita & <span class="text-red-600 italic">Kegiatan</span>
            </h1>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto mb-10">
                Kumpulan informasi terbaru mengenai aktivitas, pencapaian, dan pengumuman resmi organisasi.
            </p>

            <!-- Search Form -->
            <form action="{{ route('news') }}" method="GET" class="max-w-2xl mx-auto relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-6 w-6 text-gray-400 group-focus-within:text-red-600 transition-colors" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="block w-full pl-12 pr-32 py-4 rounded-2xl border-gray-200 border bg-white shadow-sm focus:ring-4 focus:ring-red-100 focus:border-red-600 transition-all text-gray-900 placeholder-gray-400 outline-none"
                    placeholder="Cari berita berdasarkan judul atau isi...">
                <button type="submit"
                    class="absolute inset-y-2 right-2 px-6 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl transition-colors shadow-md shadow-red-600/20 flex items-center">
                    Cari
                </button>
            </form>
        </div>
    </section>

    <!-- News Grid -->
    <section class="py-24 bg-gray-50">
        <div class="section-container">
            @if ($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    @foreach ($posts as $post)
                        <article
                            class="group bg-white rounded-[2.5rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-gray-200/50 transition-all duration-500 relative flex flex-col h-full transform hover:-translate-y-2">
                            <div class="aspect-[16/10] relative overflow-hidden">
                                @php $imageUrl = $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1585829365295-ab7cd400c167?auto=format&fit=crop&q=80&w=800'; @endphp
                                <img src="{{ $imageUrl }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                    alt="{{ $post->title }}">
                                <div
                                    class="absolute inset-x-6 top-6 flex justify-between items-start pointer-events-none">
                                    <span
                                        class="bg-red-600 text-white text-[10px] font-bold uppercase tracking-widest px-4 py-2 rounded-xl shadow-lg">Highlight</span>
                                    <span
                                        class="bg-white/90 backdrop-blur-md text-gray-900 text-[10px] font-bold px-4 py-2 rounded-xl border border-white/40 shadow-sm">{{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="p-10 flex-grow flex flex-col">
                                <h3
                                    class="text-2xl font-extrabold text-gray-900 line-clamp-2 mb-5 group-hover:text-red-600 transition-colors duration-300 leading-tight">
                                    <a href="{{ route('news.detail', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <p class="text-gray-500 text-base leading-relaxed line-clamp-3 mb-8 flex-grow">
                                    {{ Str::limit(strip_tags($post->content), 150) }}
                                </p>
                                <div class="pt-8 border-t border-gray-50 mt-auto">
                                    <a href="{{ route('news.detail', $post->slug) }}"
                                        class="inline-flex items-center text-sm font-bold text-red-600 hover:text-red-700 group/link">
                                        Selengkapnya
                                        <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-20">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-40 glass-card bg-white border-dashed border-2 border-gray-200 rounded-3xl">
                    <div class="w-20 h-20 bg-gray-50 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="h-10 w-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    @if (request('search'))
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Berita tidak ditemukan</h3>
                        <p class="text-gray-500 max-w-sm mx-auto">Kami tidak menemukan berita yang sesuai dengan kata
                            kunci "<b>{{ request('search') }}</b>". Silakan coba dengan kata kunci lain.</p>
                        <div class="mt-8">
                            <a href="{{ route('news') }}"
                                class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                                Kembali ke semua berita
                            </a>
                        </div>
                    @else
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum ada berita</h3>
                        <p class="text-gray-500 max-w-sm mx-auto">Kami sedang mempersiapkan informasi menarik untuk
                            Anda.
                            Cek kembali beberapa saat lagi.</p>
                    @endif
                </div>
            @endif
        </div>
    </section>
</x-frontend-layout>
