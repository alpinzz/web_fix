<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-8 py-4 bg-white border border-gray-200 rounded-2xl font-black text-xs text-gray-500 uppercase tracking-[0.1em] hover:bg-red-50 hover:text-red-600 hover:border-red-100 active:scale-95 focus:outline-none focus:ring-4 focus:ring-gray-100 shadow-lg shadow-gray-100 transition-all duration-400 cursor-pointer']) }}>
    {{ $slot }}
</button>
