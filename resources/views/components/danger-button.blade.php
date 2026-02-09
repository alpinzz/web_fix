<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-red-600/10 rounded-2xl font-black text-xs text-red-600 uppercase tracking-[0.1em] hover:bg-red-600 hover:text-white active:scale-95 focus:outline-none focus:ring-4 focus:ring-red-600/20 shadow-xl shadow-red-50/50 transition-all duration-400 cursor-pointer']) }}>
    {{ $slot }}
</button>
