<div class="relative">
    @if ($layout->background_colour)
        <div class="{{ $layout->background_colour ?? null }} absolute bottom-0 right-0 top-0 z-10 w-screen"></div>
    @endif
    <div
        class="{{ $class ?? 'max-w-xl mx-auto' }} {{ $layout->background_colour ? 'z-20' : null }} container relative py-16">

        @if ($layout->background_colour)
            @svg('quote-open', 'w-12 text-white')
        @else
            @svg('quote-open', 'w-12 text-light-teal')
        @endif

        <div class="{{ $layout->large ? 'text-3xl' : 'text-xl lg:text-2xl' }} font-bold">
            {!! $layout->quote !!}

            @if ($layout->background_colour)
                @svg('quote-close', 'ml-auto w-12 text-white')
            @else
                @svg('quote-close', 'ml-auto w-12 text-light-teal')
            @endif

        </div>

        @if ($layout->quote_author)
            <div class="-mt-8 flex items-center gap-4 lg:mt-0">
                @if ($layout->quote_image)
                    <x-responsive-image class="w-16 rounded-full" :image="$layout->quote_image" />
                @endif
                <p class="text-xl font-bold text-blue lg:text-2xl">{{ $layout->quote_author }}</p>
            </div>
        @endif
    </div>

</div>
