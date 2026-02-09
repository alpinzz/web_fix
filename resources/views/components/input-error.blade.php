@props(['messages'])

@if ($messages)
    <ul
        {{ $attributes->merge(['class' => 'text-[11px] font-black text-red-600 italic mt-2.5 uppercase tracking-tight ml-1 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-center">
                <span class="w-1 h-1 bg-red-600 rounded-full mr-2"></span>
                {{ $message }}
            </li>
        @endforeach
    </ul>
@endif
