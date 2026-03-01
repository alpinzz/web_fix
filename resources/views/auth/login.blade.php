<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-900">Welcome back</h2>
        <p class="mt-2 text-sm text-gray-600">Please enter your details to sign in.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <x-input-label for="email" :value="__('Email Address')"
                class="text-xs font-bold uppercase tracking-wider text-gray-500" />
            <div class="relative group">
                <x-text-input id="email"
                    class="block w-full px-4 py-3 bg-gray-50 border-gray-200 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 rounded-xl"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete=off
                    placeholder="name@company.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Password')"
                    class="text-xs font-bold uppercase tracking-wider text-gray-500" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-indigo-600 hover:text-indigo-500 transition-colors duration-200"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot?') }}
                    </a>
                @endif
            </div>

            <div class="relative group">
                <x-text-input id="password"
                    class="block w-full px-4 py-3 bg-gray-50 border-gray-200 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 rounded-xl"
                    type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Captcha -->
        <div class="space-y-2">
            <x-input-label for="captcha" :value="__('Security Code')"
                class="text-xs font-bold uppercase tracking-wider text-gray-500" />
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="captcha-img overflow-hidden rounded-xl shadow-sm border border-gray-200 bg-white">
                    {!! captcha_img('flat') !!}
                </div>
                <button type="button"
                    class="text-sm font-semibold py-2 px-4 bg-gray-50 hover:bg-gray-100 text-gray-700 rounded-xl transition-all duration-200 border border-gray-200 shadow-sm focus:ring-4 focus:ring-indigo-500/10"
                    onclick="document.querySelector('.captcha-img img').src = '/captcha/flat?' + Math.random()">
                    Reload
                </button>
            </div>
            <div class="relative group mt-2">
                <x-text-input id="captcha"
                    class="block w-full px-4 py-3 bg-gray-50 border-gray-200 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 rounded-xl"
                    type="text" name="captcha" required placeholder="Enter the code shown" autocomplete="off" />
            </div>
            <x-input-error :messages="$errors->get('captcha')" class="mt-1" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between py-2">
            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                <div class="relative flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="w-4 h-4 rounded-md border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-offset-0 transition-all duration-200 cursor-pointer"
                        name="remember">
                </div>
                <span
                    class="ms-2 text-sm text-gray-600 group-hover:text-gray-900 transition-colors duration-200 select-none">{{ __('Keep me logged in') }}</span>
            </label>
        </div>

        <div>
            <x-primary-button
                class="w-full flex justify-center py-3.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold rounded-xl shadow-lg shadow-indigo-600/20 hover:shadow-indigo-600/30 transition-all duration-200 focus:ring-4 focus:ring-indigo-600/20">
                {{ __('Sign in') }}
            </x-primary-button>
        </div>

        @if (Route::has('register'))
            <p class="text-center text-sm text-gray-600 mt-6">
                Don't have an account?
                <a href="{{ route('register') }}"
                    class="font-semibold text-indigo-600 hover:text-indigo-500 transition-colors duration-200">
                    Create account
                </a>
            </p>
        @endif
    </form>
</x-guest-layout>
