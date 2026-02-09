<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <span class="text-xs font-bold text-red-600 uppercase tracking-[0.2em] mb-1">Publisher</span>
            <h2 class="font-extrabold text-3xl text-gray-900 leading-tight tracking-tight">
                {{ __('Tambah Berita') }}
            </h2>
        </div>
    </x-slot>

    <div class="animate-fade-in pb-12">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-10">
                    <div class="glass-card bg-white border border-gray-100 p-10 shadow-premium rounded-[2.5rem]">
                        <h3 class="text-xl font-black text-gray-900 tracking-tight mb-8">Informasi Utama</h3>

                        <!-- Title -->
                        <div class="mb-10">
                            <x-input-label for="title" :value="__('Judul Publikasi')" />
                            <x-text-input id="title" class="block w-full !text-lg !font-extrabold !px-6 !py-5"
                                type="text" name="title" :value="old('title')" required autofocus
                                placeholder="Tulis judul berita yang menarik..." />
                            <x-input-error :messages="$errors->get('title')" />
                        </div>

                        <!-- Content -->
                        <div>
                            <x-input-label for="content" :value="__('Isi Berita & Konten')" />
                            <textarea id="content" name="content" rows="18"
                                class="block w-full px-6 py-5 bg-gray-50 border-gray-100 focus:bg-white focus:border-red-600 focus:ring-8 focus:ring-red-600/5 transition-all duration-300 rounded-[2rem] text-sm font-semibold text-gray-900 placeholder:text-gray-300 leading-relaxed shadow-sm shadow-gray-100/50"
                                required placeholder="Tuliskan narasi lengkap berita di sini...">{{ old('content') }}</textarea>
                            <x-input-error :messages="$errors->get('content')" />
                        </div>
                    </div>
                </div>

                <!-- Sidebar Settings -->
                <div class="lg:col-span-1 space-y-10">
                    <!-- Image Upload -->
                    <div class="glass-card bg-white border border-gray-100 p-8 shadow-premium rounded-[2.5rem]">
                        <h3 class="text-lg font-black text-gray-900 tracking-tight mb-8">Cover Berita</h3>

                        <div class="space-y-6">
                            <div class="relative group">
                                <div
                                    class="w-full aspect-video bg-gray-50 rounded-[2rem] border-2 border-dashed border-gray-200 flex flex-col items-center justify-center overflow-hidden transition-all duration-500 group-hover:border-red-600/30 group-hover:bg-red-50/50">
                                    <svg class="w-12 h-12 text-gray-300 mb-4 transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-3"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Pilih
                                        Gambar Utama</p>
                                    <p class="text-[9px] font-bold text-gray-300 mt-1 uppercase">Max 2MB • JPG, PNG</p>
                                </div>
                                <input id="image" type="file" name="image"
                                    class="absolute inset-0 opacity-0 cursor-pointer" required>
                            </div>
                            <x-input-error :messages="$errors->get('image')" />
                        </div>
                    </div>

                    <!-- Visibility & Status -->
                    <div class="glass-card bg-white border border-gray-100 p-8 shadow-premium rounded-[2.5rem]">
                        <h3 class="text-lg font-black text-gray-900 tracking-tight mb-8">Pengaturan Publikasi</h3>

                        <div class="space-y-8">
                            <div
                                class="group flex items-center justify-between p-4 bg-gray-50 rounded-2xl border border-gray-100 transition-colors hover:bg-red-50 hover:border-red-100">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-white rounded-xl shadow-sm border border-gray-100 flex items-center justify-center text-gray-400 group-hover:text-red-600 transition duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-[10px] font-black text-gray-900 uppercase tracking-widest">
                                            Visibility</p>
                                        <p class="text-[10px] font-bold text-gray-400 uppercase">Publish Now</p>
                                    </div>
                                </div>
                                <div class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-gray-200 transition-colors duration-200 ease-in-out focus:outline-none"
                                    x-data="{ checked: {{ old('is_published') ? 'true' : 'false' }} }" @click="checked = !checked"
                                    :class="checked ? 'bg-red-600' : 'bg-gray-200'">
                                    <input type="checkbox" name="is_published" value="1" class="hidden"
                                        x-model="checked">
                                    <span
                                        class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                        :class="checked ? 'translate-x-5' : 'translate-x-0'"></span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 flex flex-col gap-4">
                            <x-primary-button class="h-16">
                                {{ __('Simpan & Publish') }}
                            </x-primary-button>
                            <a href="{{ route('admin.posts.index') }}"
                                class="w-full inline-flex items-center justify-center px-8 py-4 bg-white border border-gray-100 rounded-2xl font-black text-[10px] text-gray-400 uppercase tracking-widest hover:bg-gray-50 hover:text-gray-900 transition-all duration-300">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
