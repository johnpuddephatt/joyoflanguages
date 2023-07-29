<div class="{{ $class ?? 'max-w-2xl ' }} container">
    <div class="relative my-8 flex flex-row items-center gap-12 bg-light-teal p-12">

        @if ($layout->type == 'radio')
            @svg('radio')
        @endif
        @if ($layout->type == 'article')
            @svg('article')
        @endif

        <div>
            <p class="text-2xl font-bold">{{ $layout->publication_name }}</p>

            <h2 class="mb-4 text-3xl font-bold">{{ $layout->title }}</h2>
            <x-button-link class="shadow-yellow" href="{{ $layout->link }}">
                {{ $layout->button_text ?? 'Read more' }}</x-button-link>
        </div>

    </div>
</div>
