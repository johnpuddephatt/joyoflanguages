    @include('flexible.text-with-image', ['layout' => $layout])
    <div id="{{ $layout ? $layout->key() : null }}"
        class="{{ $layout->background_colour }} flex flex-col gap-8 pb-16 md:gap-12 lg:gap-16">

        @if ($layout->features)
            @foreach ($layout->features as $feature)
                <div class="{{ $class ?? 'mx-auto max-w-6xl' }} container relative grid gap-6 md:grid-cols-2">
                    <div
                        class="{{ $loop->even ? 'lg:order-last' : null }} relative z-10 flex flex-col items-start justify-center pt-4 lg:px-8 lg:py-8">
                        <h3 class="type-lg max-w-lg">{!! $feature->title !!}</h3>
                        @if ($feature->description)
                            <div class="prose lg:prose-lg max-w-md lg:mb-8">@markdown($feature->description)</div>
                        @endif
                    </div>
                    <x-library-image :image="$feature->image" conversion="uncropped" class="aspect-[1.43] w-full max-w-none" />

                </div>
            @endforeach
        @endif

    </div>
