<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <span class="text-xs font-bold text-red-600 uppercase tracking-[0.2em] mb-1">Human Resources
                Management</span>
            <h2 class="font-extrabold text-3xl text-gray-900 leading-tight tracking-tight">
                {{ __('Edit Personel') }}
            </h2>
        </div>
    </x-slot>

    <div class="animate-fade-in pb-12">
        <form action="{{ route('admin.members.update', $member) }}" method="POST" enctype="multipart/form-data"
            class="space-y-10">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Profile Section -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="glass-card bg-white border border-gray-100 p-8 shadow-premium rounded-[2.5rem]">
                        <h3 class="text-lg font-black text-gray-900 tracking-tight mb-8">Foto Personel</h3>

                        <div class="flex flex-col items-center">
                            <div class="relative group">
                                <div
                                    class="w-48 h-48 bg-gray-50 rounded-full border-2 border-dashed border-gray-200 flex flex-col items-center justify-center overflow-hidden transition-all duration-500 group-hover:border-red-600/30 group-hover:bg-red-50/50">
                                    @if ($member->photo)
                                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    @else
                                        <svg class="w-16 h-16 text-gray-200 mb-2 transition-transform duration-500 group-hover:scale-110"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                        </svg>
                                        <p class="text-[9px] font-black uppercase tracking-widest text-gray-400">Upload
                                            Foto</p>
                                    @endif
                                </div>
                                <input id="photo" type="file" name="photo"
                                    class="absolute inset-0 opacity-0 cursor-pointer">
                                <label for="photo"
                                    class="absolute bottom-2 right-2 w-10 h-10 bg-white border border-gray-100 shadow-xl rounded-full flex items-center justify-center text-red-600 cursor-pointer hover:bg-red-600 hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </label>
                            </div>
                            <p class="mt-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-center">
                                Rasio 1:1 direkomendasikan<br><span class="text-gray-300 font-medium">Maks. 2MB (JPG,
                                    PNG)</span></p>
                            <x-input-error :messages="$errors->get('photo')" />
                        </div>
                    </div>
                </div>

                <!-- Identity Section -->
                <div class="lg:col-span-2 space-y-10">
                    <div class="glass-card bg-white border border-gray-100 p-10 shadow-premium rounded-[2.5rem]">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-xl font-black text-gray-900 tracking-tight">Identitas & Jabatan</h3>
                            <div
                                class="flex items-center text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                <span class="w-2 h-2 rounded-full bg-red-600 mr-2"></span>
                                Personel ID: #{{ $member->id }}
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <x-input-label for="name" :value="__('Nama Lengkap Sesuai Identitas')" />
                                <x-text-input id="name" type="text" name="name" :value="old('name', $member->name)" required
                                    autofocus />
                                <x-input-error :messages="$errors->get('name')" />
                            </div>

                            <!-- Division -->
                            <div>
                                <x-input-label for="division" :value="__('Divisi / Bidang')" />
                                <select id="division" name="division"
                                    class="block w-full px-5 py-4 bg-gray-50 border-gray-100 focus:bg-white focus:border-red-600 focus:ring-8 focus:ring-red-600/5 transition-all duration-300 rounded-2xl text-sm font-semibold text-gray-900">
                                    <option value="" disabled>Pilih Divisi</option>
                                    <option value="BPH"
                                        {{ old('division', $member->division) == 'BPH' ? 'selected' : '' }}>BPH (Badan
                                        Pengurus Harian)</option>
                                    <option value="Bidang Kader"
                                        {{ old('division', $member->division) == 'Bidang Kader' ? 'selected' : '' }}>
                                        Bidang Kader</option>
                                    <option value="Bidang Organisasi"
                                        {{ old('division', $member->division) == 'Bidang Organisasi' ? 'selected' : '' }}>
                                        Bidang Organisasi</option>
                                    <option value="Bidang RPK"
                                        {{ old('division', $member->division) == 'Bidang RPK' ? 'selected' : '' }}>
                                        Bidang RPK</option>
                                    <option value="Bidang Hikmah"
                                        {{ old('division', $member->division) == 'Bidang Hikmah' ? 'selected' : '' }}>
                                        Bidang Hikmah</option>
                                    <option value="Bidang TKK"
                                        {{ old('division', $member->division) == 'Bidang TKK' ? 'selected' : '' }}>
                                        Bidang TKK</option>
                                    <option value="Bidang SBO"
                                        {{ old('division', $member->division) == 'Bidang SBO' ? 'selected' : '' }}>
                                        Bidang SBO</option>
                                    <option value="Bidang Medkom"
                                        {{ old('division', $member->division) == 'Bidang Medkom' ? 'selected' : '' }}>
                                        Bidang Medkom</option>
                                </select>
                                <x-input-error :messages="$errors->get('division')" />
                            </div>

                            <!-- Position -->
                            <div>
                                <x-input-label for="position" :value="__('Jabatan Struktural')" />
                                <select id="position" name="position"
                                    class="block w-full px-5 py-4 bg-gray-50 border-gray-100 focus:bg-white focus:border-red-600 focus:ring-8 focus:ring-red-600/5 transition-all duration-300 rounded-2xl text-sm font-semibold text-gray-900 disabled:opacity-50"
                                    required disabled>
                                    <option value="" disabled selected>Pilih Jabatan</option>
                                </select>
                                <x-input-error :messages="$errors->get('position')" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-4 gap-4">
                        <a href="{{ route('admin.members.index') }}"
                            class="inline-flex items-center justify-center px-8 py-4 bg-white border border-gray-100 rounded-2xl font-black text-[10px] text-gray-400 uppercase tracking-widest hover:bg-gray-50 hover:text-gray-900 transition-all duration-300">
                            Batal
                        </a>
                        <x-primary-button class="w-full sm:w-auto h-16">
                            {{ __('Perbarui Data Personel') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const divisionSelect = document.getElementById('division');
            const positionSelect = document.getElementById('position');
            const currentPosition = "{{ old('position', $member->position) }}";

            const optionsBPH = ['Ketua Umum', 'Sekretaris Umum', 'Bendahara Umum'];
            const optionsBidang = ['Ketua Bidang', 'Sekretaris Bidang', 'Anggota'];

            function updatePositions() {
                const division = divisionSelect.value;
                positionSelect.innerHTML = '<option value="" disabled selected>Pilih Jabatan</option>';
                positionSelect.disabled = false;

                let options = [];
                if (division === 'BPH') {
                    options = optionsBPH;
                } else if (division) {
                    options = optionsBidang;
                } else {
                    positionSelect.innerHTML = '<option value="" disabled selected>Pilih Divisi Dulu</option>';
                    positionSelect.disabled = true;
                }

                options.forEach(option => {
                    const opt = document.createElement('option');
                    opt.value = option;
                    opt.textContent = option;
                    if (option === currentPosition) opt.selected = true;
                    positionSelect.appendChild(opt);
                });
            }

            divisionSelect.addEventListener('change', updatePositions);
            if (divisionSelect.value) updatePositions();
        });
    </script>

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
