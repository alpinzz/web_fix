<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <span class="text-xs font-bold text-red-600 uppercase tracking-[0.2em] mb-1">Settings</span>
            <h2 class="font-extrabold text-3xl text-gray-900 leading-tight tracking-tight">
                {{ __('Profil Organisasi') }}
            </h2>
        </div>
    </x-slot>

    <div class="animate-fade-in pb-12">
        @if (session('success'))
            <div class="mb-8 p-1 bg-linear-to-r from-green-500 to-emerald-600 rounded-3xl shadow-lg shadow-green-500/20">
                <div class="bg-white rounded-[1.4rem] px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div
                            class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center text-green-600 mr-4 border border-green-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <p class="text-sm font-bold text-gray-900">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.organization-profile.update') }}" method="POST" enctype="multipart/form-data"
            class="space-y-10">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Branding Section -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="glass-card bg-white border border-gray-100 p-8 shadow-premium rounded-[2.5rem]">
                        <h3 class="text-lg font-black text-gray-900 tracking-tight mb-8">Identitas Visual</h3>

                        <!-- Logo -->
                        <div class="space-y-4">
                            <x-input-label for="logo" :value="__('Logo Organisasi')" />
                            <div class="flex flex-col items-center">
                                <div class="relative group">
                                    <div
                                        class="w-40 h-40 bg-gray-50 rounded-[2rem] border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden transition-all duration-500 group-hover:border-red-600/30 group-hover:bg-red-50/50">
                                        @if ($profile->logo)
                                            <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo"
                                                class="w-full h-full object-contain p-6 transition-transform duration-500 group-hover:scale-110">
                                        @else
                                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        @endif
                                        <div
                                            class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/5 transition-colors duration-500">
                                        </div>
                                    </div>
                                    <label for="logo"
                                        class="absolute -bottom-3 left-1/2 -translate-x-1/2 px-4 py-2 bg-white border border-gray-100 shadow-xl rounded-xl text-[10px] font-black uppercase tracking-widest text-red-600 cursor-pointer hover:bg-red-600 hover:text-white transition-all duration-300">
                                        Ganti Logo
                                    </label>
                                </div>
                                <input id="logo" type="file" name="logo" class="hidden">
                            </div>
                            <x-input-error :messages="$errors->get('logo')" />
                        </div>

                        <div class="mt-12 pt-8 border-t border-gray-50 flex flex-col gap-8">
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Nama Organisasi')" />
                                <x-text-input id="name" type="text" name="name" :value="old('name', $profile->name)" required
                                    autofocus />
                                <x-input-error :messages="$errors->get('name')" />
                            </div>

                            <!-- Video URL -->
                            <div>
                                <x-input-label for="video_url" :value="__('Video Profil (YouTube)')" />
                                <x-text-input id="video_url" type="url" name="video_url" :value="old('video_url', $profile->video_url)"
                                    placeholder="https://youtube.com/..." />
                                <x-input-error :messages="$errors->get('video_url')" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="lg:col-span-2 space-y-10">
                    <div class="glass-card bg-white border border-gray-100 p-10 shadow-premium rounded-[2.5rem]">
                        <h3 class="text-xl font-black text-gray-900 tracking-tight mb-8">Visi & Misi Perjuangan</h3>

                        <!-- Vision -->
                        <div class="mb-10">
                            <x-input-label for="vision" :value="__('Visi Strategis')" />
                            <textarea id="vision" name="vision" rows="4"
                                class="block w-full px-5 py-4 bg-gray-50 border-gray-100 focus:bg-white focus:border-red-600 focus:ring-8 focus:ring-red-600/5 transition-all duration-300 rounded-2xl text-sm font-semibold text-gray-900 placeholder:text-gray-300 shadow-sm shadow-gray-100/50">{{ old('vision', $profile->vision) }}</textarea>
                            <x-input-error :messages="$errors->get('vision')" />
                        </div>

                        <!-- Mission -->
                        <div x-data="{
                            missions: {{ json_encode(old('mission', $profile->mission ?? [])) }},
                            add() { this.missions.push('') },
                            remove(index) { this.missions.splice(index, 1) }
                        }">
                            <x-input-label :value="__('Misi Operasional')" />

                            <div class="space-y-4 mb-2">
                                <template x-for="(mission, index) in missions" :key="index">
                                    <div class="group flex items-center gap-4 animate-fade-in">
                                        <div class="w-10 h-10 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-center text-[10px] font-black text-gray-400 group-hover:bg-red-50 group-hover:text-red-600 transition duration-300"
                                            x-text="index + 1"></div>
                                        <input type="text" :name="'mission[' + index + ']'" x-model="missions[index]"
                                            class="block flex-grow px-5 py-3.5 bg-gray-50 border-gray-100 focus:bg-white focus:border-red-600 focus:ring-4 focus:ring-red-600/5 transition-all duration-300 rounded-2xl text-sm font-semibold text-gray-900"
                                            placeholder="Tulis misi poin ini..." required>
                                        <button type="button" @click="remove(index)"
                                            class="w-10 h-10 rounded-xl bg-white border border-gray-100 text-gray-400 hover:text-red-600 hover:bg-red-50 transition-all duration-300 flex items-center justify-center">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </template>
                            </div>

                            <button type="button" @click="add()"
                                class="mt-4 group flex items-center px-6 py-3 bg-gray-900 rounded-2xl text-[10px] font-black text-white uppercase tracking-widest hover:bg-red-600 transition-all duration-300 shadow-xl shadow-gray-900/10 hover:shadow-red-600/20 active:scale-95">
                                <span class="mr-2.5 text-lg group-hover:rotate-90 transition duration-300">+</span>
                                Tambah Poin Misi
                            </button>
                        </div>
                    </div>

                    <div class="glass-card bg-white border border-gray-100 p-10 shadow-premium rounded-[2.5rem]">
                        <h3 class="text-xl font-black text-gray-900 tracking-tight mb-8">Naratif Sejarah</h3>

                        <!-- History -->
                        <div>
                            <x-input-label for="history" :value="__('Sejarah & Legacy Organisasi')" />
                            <textarea id="history" name="history" rows="10"
                                class="block w-full px-5 py-4 bg-gray-50 border-gray-100 focus:bg-white focus:border-red-600 focus:ring-8 focus:ring-red-600/5 transition-all duration-300 rounded-3xl text-sm font-semibold text-gray-900 placeholder:text-gray-300 leading-relaxed shadow-sm shadow-gray-100/50">{{ old('history', $profile->history) }}</textarea>
                            <x-input-error :messages="$errors->get('history')" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-4">
                        <x-primary-button class="w-full sm:w-auto h-16">
                            {{ __('Simpan Semua Perubahan') }}
                        </x-primary-button>
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
