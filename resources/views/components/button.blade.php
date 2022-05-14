{{-- make button blade component using tailwindcss --}}
<button class="{{ $class }} my-button">
    {{ $text ?? 'Button' }}
    @if($url)
        <a href="{{ $url }}" class="{{ $linkClass ?? '' }}">
            {{ $linkText ?? 'Link' }}
        </a>
    @endif
</button>

