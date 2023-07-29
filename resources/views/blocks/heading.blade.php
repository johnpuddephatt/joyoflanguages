@if (isset($content))
    <h{{ $attrs['level'] ?? 2 }} class="{{ $class }}">

        @include('blocks.text', ['content' => $content])

        </h{{ $attrs['level'] ?? 2 }}>
@endif
