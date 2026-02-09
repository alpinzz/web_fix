<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-8 py-4 bg-red-600 border border-red-500 rounded-2xl font-black text-xs text-white uppercase tracking-[0.15em] hover:bg-gray-900 active:scale-95 focus:outline-none focus:ring-4 focus:ring-red-600/20 shadow-xl shadow-red-600/10 hover:shadow-gray-900/10 transition-all duration-400 cursor-pointer']) }}>
    {{ $slot }}
</button>
