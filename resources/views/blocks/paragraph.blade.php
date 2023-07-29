@if (isset($content))
    <p class="{{ $class }} {{ ($attrs['variant'] ?? null) == 'large' ? 'text-xl' : '' }}">
        @include('blocks.text', ['content' => $content])
    </p>
@endif
