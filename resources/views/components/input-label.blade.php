@props(['value'])

<label
    {{ $attributes->merge(['class' => 'block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1']) }}>
    {{ $value ?? $slot }}
</label>
