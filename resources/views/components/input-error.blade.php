@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'font-extrabold bg-red-100 border border-red-400 text-sm text-red-700 py-2 text-center']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
