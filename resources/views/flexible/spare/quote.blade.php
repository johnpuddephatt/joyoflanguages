<blockquote
    class="bg-{{ $layout->background_colour ?? 'teal' }} flex flex-col justify-center py-32 text-center lg:py-48 lg:text-left">
    <div class="container">

        <p
            class="text-{{ $layout->quote_colour ?? 'white' }} quote-indent max-w-7xl text-4xl font-bold italic lg:text-7xl xl:text-8xl 2xl:-indent-10">
            “ <span class="text-{{ $layout->text_colour ?? 'lilac' }}">{{ $layout->quote }}</span>&nbsp;”
        </p>
        @if ($layout->source)
            <cite class="mt-8 block text-3xl font-bold not-italic text-white">{{ $layout->source }}</cite>
        @endif
    </div>
</blockquote>
