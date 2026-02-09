<section class="space-y-10">
    <header>
        <h2 class="text-xl font-black text-red-600 tracking-tight">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-relaxed max-w-2xl">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda pertahankan.') }}
        </p>
    </header>

    <div class="flex">
        <x-danger-button class="h-14 px-10" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Hapus Akun Sekarang') }}</x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-12 bg-white">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-gray-900 tracking-tight mb-4">
                {{ __('Apakah Anda yakin ingin menghapus akun?') }}
            </h2>

            <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest leading-relaxed mb-8">
                {{ __('Setelah akun Anda dihapus, semua datanya akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi penghapusan permanen.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="block w-full"
                    placeholder="{{ __('Masukkan Kata Sandi Anda') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-4" />
            </div>

            <div class="mt-12 flex items-center justify-end gap-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="h-14 px-8">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="h-14 px-10">
                    {{ __('Konfirmasi Hapus Akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
