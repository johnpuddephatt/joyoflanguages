<div id="{{ $layout ? $layout->key() : null }}" class="relative">
    @if ($layout->background_colour)
        <div class="{{ $layout->background_colour ?? null }} absolute bottom-0 right-0 top-0 z-10 w-screen"></div>
    @endif
    <div
        class="{{ $class ?? 'lg:max-w-4xl mx-auto' }} {{ $layout->background_colour ? 'z-20' : null }} container relative py-8 lg:py-12 2xl:py-16">

        @if ($layout->background_colour)
            @svg('quote-open', 'w-12 text-white')
        @else
            @svg('quote-open', 'w-12 text-light-teal')
        @endif

        <div class="{{ $layout->large ? 'type-md' : 'type-sm' }}">
            {!! $layout->quote !!}

            @if ($layout->background_colour)
                @svg('quote-close', 'ml-auto w-10 lg:w-12 text-white')
            @else
                @svg('quote-close', 'ml-auto w-10 lg:w-12 text-light-teal')
            @endif

        </div>

        @if ($layout->quote_author)
            <div class="-mt-8 flex items-center gap-3 lg:-mt-4 lg:gap-4">
                @if ($layout->quote_image)
                    <x-responsive-image class="w-12 rounded-full lg:w-16" :image="$layout->quote_image" />
                @endif
                <p class="type-sm text-blue">{{ $layout->quote_author }}</p>
            </div>
        @endif
    </div>

</div>
