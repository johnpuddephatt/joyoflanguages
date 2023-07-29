@if (isset($content))
    <pre class="{{ $class }} rounded bg-black p-4 text-white"><code>@include('blocks.text', ['content' => $content])</code></pre>
@endif
