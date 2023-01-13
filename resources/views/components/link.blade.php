<div>
    @php
        $classes = "text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
    @endphp
    <a {{ $attributes->merge(['class' => $classes])}}>
        {{$slot}}
    </a>
</div>