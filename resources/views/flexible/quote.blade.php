<div class="relative">
    @if ($layout->colour)
        <div class="{{ $layout->colour ?? null }} absolute right-0 top-0 bottom-0 z-10 w-screen"></div>
    @endif
    <div class="{{ $class ?? 'max-w-2xl mx-auto' }} {{ $layout->colour ? 'z-20' : null }} container relative py-24">

        @if ($layout->colour)
            @svg('quote-open', 'w-12 text-white')
        @else
            @svg('quote-open', 'w-12 text-blue')
        @endif

        <div class="{{ $layout->colour ? 'text-3xl' : 'text-2xl' }} font-bold">{!! $layout->quote !!}

            @if ($layout->colour)
                @svg('quote-close', 'ml-auto w-12 text-white')
            @else
                @svg('quote-close', 'ml-auto w-12 text-blue')
            @endif

        </div>

        <div class="flex items-center gap-4">
            <x-responsive-image class="w-16 rounded-full" :image="$layout->quote_image" />
            <p class="text-2xl font-bold text-blue">{{ $layout->quote_author }}</p>
        </div>
    </div>

</div>
