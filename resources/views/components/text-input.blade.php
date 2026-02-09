@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'block w-full px-5 py-4 bg-gray-50 border-gray-100 focus:bg-white focus:border-red-600 focus:ring-8 focus:ring-red-600/5 transition-all duration-300 rounded-2xl text-sm font-semibold text-gray-900 placeholder:text-gray-300 shadow-sm shadow-gray-100/50']) }}>
