<div id="{{ $layout ? $layout->key() : null }}" class="{{ $class ?? 'max-w-7xl mx-auto' }} container my-8">
    <div class="prose prose-lg relative">
        {!! $layout->content !!}
    </div>
</div>
