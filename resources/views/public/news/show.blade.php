<x-frontend-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-red-600">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('news') }}" class="hover:text-indigo-600">Berita</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 truncate">{{ $post->title }}</span>
        </nav>

        <article>
            <header class="mb-8">
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <time
                        datetime="{{ $post->published_at }}">{{ $post->published_at ? $post->published_at->format('d F Y') : '' }}</time>
                    <span class="mx-2">&bull;</span>
                    <span>Admin</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $post->title }}
                </h1>
                @if ($post->image)
                    <div class="rounded-2xl overflow-hidden shadow-lg mb-8">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                            class="w-full h-auto object-cover max-h-[500px]">
                    </div>
                @endif
            </header>

            <div class="prose prose-indigo prose-lg max-w-none text-gray-600 leading-relaxed">
                {!! nl2br(e($post->content)) !!}
            </div>

            <div class="mt-12 pt-8 border-t border-gray-200">
                <a href="{{ route('news') }}"
                    class="inline-flex items-center text-indigo-600 font-medium hover:text-indigo-800 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar Berita
                </a>
            </div>
        </article>
    </div>
</x-frontend-layout>
