@if (isset($attrs['src']))
    <figure class="{{ $class }}">
        <iframe class="block aspect-video w-full"
            src="{{ Str::of($attrs['src'])->replace('watch', 'embed')->replace('?v=', '/') }}" frameborder="0"
            allow="autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        @if (isset($content))
            @include('blocks.text', ['content' => $content])
        @endif
    </figure>
@endif
