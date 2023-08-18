    @include('flexible.text-with-image', ['layout' => $layout])
    <div class="{{ $layout->background_colour }} flex flex-col gap-8 pb-16 lg:gap-16">

        @if ($layout->features)
            @foreach ($layout->features as $feature)
                <div class="{{ $class ?? 'mx-auto max-w-6xl' }} container relative block md:grid md:grid-cols-2">

                    <x-library-image :image="$feature->image" conversion="uncropped" class="w-full max-w-none" />

                    <div
                        class="{{ $loop->odd ? 'lg:order-first' : null }} relative z-10 flex flex-col items-start justify-center pt-4 lg:px-8 lg:py-8">
                        <h3 class="mb-2 max-w-lg text-2xl font-bold lg:mb-4 lg:text-4xl">{!! $feature->title !!}</h3>
                        @if ($feature->description)
                            <div class="max-w-sm lg:mb-8">@markdown($feature->description)</div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

    </div>
