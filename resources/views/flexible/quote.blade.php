<div class="relative">
    @if ($layout->colour)
        <div class="{{ $layout->colour ?? null }} absolute bottom-0 right-0 top-0 z-10 w-screen"></div>
    @endif
    <div
        class="{{ $class ?? 'max-w-xl mx-auto' }} {{ $layout->colour ? 'z-20' : null }} relative py-16 max-md:container">

        @if ($layout->colour)
            @svg('quote-open', 'w-12 text-white')
        @else
            @svg('quote-open', 'w-12 text-light-teal')
        @endif

        <div class="{{ $layout->colour ? 'text-3xl' : 'text-xl lg:text-2xl' }} font-bold">{!! $layout->quote !!}

            @if ($layout->colour)
                @svg('quote-close', 'ml-auto w-12 text-white')
            @else
                @svg('quote-close', 'ml-auto w-12 text-light-teal')
            @endif

        </div>

        <div class="-mt-8 flex items-center gap-4 lg:mt-0">
            <x-responsive-image class="w-16 rounded-full" :image="$layout->quote_image" />
            <p class="text-xl font-bold text-blue lg:text-2xl">{{ $layout->quote_author }}</p>
        </div>
    </div>

</div>
