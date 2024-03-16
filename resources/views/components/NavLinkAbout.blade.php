<a {{ $attributes->merge(['class' => 'nav-link', 'href' => route('about')]) }}>
    {{ $slot }}
</a>