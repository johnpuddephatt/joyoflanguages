@if (isset($attrs['src']))
    {{ $class }}
    <figure class="{{ $class }}">
        <iframe class="block aspect-video w-full" src="{{ str_replace('watch', 'embed', $attrs['src']) }}" frameborder="0"
            allow="autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        @include('blocks.text', ['content' => $content])
    </figure>
@endif
