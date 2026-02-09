<section>
    <header class="mb-8">
        <h2 class="text-xl font-black text-gray-900 tracking-tight">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-relaxed">
            {{ __('Perbarui informasi akun dan alamat email Anda.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-8">
        @csrf
        @method('patch')

        <div class="space-y-6">
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Alamat Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div class="mt-4 p-4 bg-red-50 rounded-2xl border border-red-100">
                        <p class="text-[10px] font-bold text-red-600 uppercase tracking-widest mb-2">
                            {{ __('Email Anda belum terverifikasi.') }}
                        </p>

                        <button form="send-verification"
                            class="text-[10px] font-black text-red-700 uppercase tracking-[0.1em] hover:text-red-900 transition-colors">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-[10px] font-bold text-green-600 uppercase tracking-widest">
                                {{ __('Link verifikasi baru telah dikirim ke alamat email Anda.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-6 pt-4">
            <x-primary-button class="h-14">
                {{ __('Simpan Perubahan') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center text-[10px] font-black text-green-600 uppercase tracking-widest">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ __('Berhasil Disimpan') }}
                </div>
            @endif
        </div>
    </form>
</section>
