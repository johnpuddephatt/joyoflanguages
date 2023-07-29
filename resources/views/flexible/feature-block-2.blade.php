    <div
        class="bg-{{ $layout->colour ?? 'teal-light' }} {{ $class ?? 'mx-auto max-w-7xl' }} container relative mb-24 block rounded-3xl bg-opacity-20 py-8 md:grid md:grid-cols-2 lg:py-16">

        <x-responsive-image :image="$layout->image" class="" />

        <div
            class="{{ $layout->reverse ? 'order-first' : null }} relative z-10 flex flex-col items-start justify-center py-8 px-8">
            <h2 class="mb-8 max-w-lg text-2xl font-bold lg:text-4xl">{!! $layout->title !!}</h2>
            @if ($layout->subtitle)
                <div class="text-xl font-bold lg:text-2xl">{{ $layout->subtitle }}</div>
            @endif
            @if ($layout->description)
                <div class="mt-8 max-w-sm">@markdown($layout->description)</div>
            @endif

            <div class="flex flex-row gap-2">
                @if ($layout->button_url)
                    <x-button-link class="mt-8 shadow-white"
                        :href="$layout->button_url">{{ $layout->button_text ?? 'Read more' }}</x-button-link>
                @endif

                @if ($layout->button_2_url)
                    <x-button-link class="mt-8 shadow-white"
                        :href="$layout->button_2_url">{{ $layout->button_2_text ?? 'Read more' }}</x-button-link>
                @endif
            </div>
        </div>

    </div>

    @if ($layout->images)
        <div class="container flex flex-row gap-8">
            @foreach ($layout->images as $image)
                <div class="relative flex-1">
                    <x-library-image class="w-full" conversion="portrait" :image="$image->image" />
                    <div class="absolute right-0 top-0 z-10 h-24 w-24 rounded-full bg-yellow p-4">{{ $image->caption }}
                    </div>
                </div>
            @endforeach

        </div>
    @endif
