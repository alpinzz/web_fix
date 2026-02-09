<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <span class="text-xs font-bold text-red-600 uppercase tracking-[0.2em] mb-1">Account settings</span>
            <h2 class="font-extrabold text-3xl text-gray-900 leading-tight tracking-tight">
                {{ __('Pengaturan Profil') }}
            </h2>
        </div>
    </x-slot>

    <div class="animate-fade-in pb-12">
        <div class="max-w-4xl mx-auto space-y-10 px-4 sm:px-6 lg:px-8">
            <!-- Profile Info Section -->
            <div class="glass-card bg-white border border-gray-100 p-8 sm:p-12 shadow-premium rounded-[2.5rem]">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Password Section -->
            <div class="glass-card bg-white border border-gray-100 p-8 sm:p-12 shadow-premium rounded-[2.5rem]">
                @include('profile.partials.update-password-form')
            </div>

            <!-- Danger Zone -->
            <div class="glass-card bg-red-50/30 border border-red-100 p-8 sm:p-12 shadow-premium rounded-[2.5rem]">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
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
