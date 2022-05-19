@props(['active'])

@php
$classes = ($active ?? false)
            ? 'active'
            : '';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    <a href="{{ $href }}">
        <div>
            <i class="{{ $icon }}"></i>
            <span>{{ $slot }}</span>
        </div>
    </a>
</li>