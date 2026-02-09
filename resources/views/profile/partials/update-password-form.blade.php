<section>
    <header class="mb-8">
        <h2 class="text-xl font-black text-gray-900 tracking-tight">
            {{ __('Keamanan Akun') }}
        </h2>

        <p class="mt-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-relaxed">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang kuat untuk menjaga keamanan.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-8">
        @csrf
        @method('put')

        <div class="space-y-6">
            <div>
                <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')" />
                <x-text-input id="update_password_current_password" name="current_password" type="password"
                    class="mt-1 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" />
            </div>

            <div>
                <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" />
                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" />
            </div>

            <div>
                <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi Baru')" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
            </div>
        </div>

        <div class="flex items-center gap-6 pt-4">
            <x-primary-button class="h-14">
                {{ __('Perbarui Password') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center text-[10px] font-black text-green-600 uppercase tracking-widest">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ __('Password Diperbarui') }}
                </div>
            @endif
        </div>
    </form>
</section>
