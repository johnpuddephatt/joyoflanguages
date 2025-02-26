@if (isset($attrs['src']))

    @php
        if (preg_match('/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i', $attrs['src'], $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        } elseif (preg_match('/youtu.be\/([a-zA-Z0-9_\-]+)\??/i', $attrs['src'], $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
    @endphp

    @if ($youtube_id)
        <figure class="{{ $class }}">
            <iframe class="block aspect-video w-full" src="https://www.youtube.com/embed/{{ $youtube_id }}"
                frameborder="0" allow="autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            @if (isset($content))
                @include('blocks.text', ['content' => $content])
            @endif
        </figure>
    @endif
@else
    <!-- Video not found -->
@endif
