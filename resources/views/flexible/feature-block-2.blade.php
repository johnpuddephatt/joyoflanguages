<div class="py-16">
    <div
        class="bg-{{ $layout->colour ?? 'teal-light' }} {{ $class ?? 'mx-auto max-w-7xl' }} {{ $layout->images ? ' pb-24 lg:pb-48' : null }} relative flex flex-row gap-8 rounded-3xl bg-opacity-20 p-8 lg:p-16">

        <img class="w-2/5" src="{{ Storage::url($layout->image) }}" />

        <div
            class="{{ $layout->reverse ? 'order-first' : null }} relative z-10 flex flex-1 flex-col items-start justify-center px-8 py-8">
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
        <div class="{{ $class ?? 'mx-auto max-w-7xl' }} relative -mt-36 flex flex-row gap-16 px-24">
            @foreach ($layout->images as $key => $image)
                <div
                    class="{{ match ($key) {0 => '-rotate-6',1 => 'rotate-3',2 => '-rotate-3'} }} rotate relative flex-1">
                    <x-library-image class="w-full" conversion="portrait" :image="$image->image" :alt="'Photo of ' . $image->caption" />
                    <div
                        class="{{ match ($key) {0 => 'top-1/2 -left-4',1 => '-right-4 -bottom-4',2 => '-right-4 top-1/4'} }} absolute z-10 flex h-24 w-24 items-center justify-center rounded-full p-4 text-center font-bold leading-none">

                        <svg class="absolute inset-0 -z-10 h-full w-full max-w-none" xmlns="http://www.w3.org/2000/svg"
                            width="62.93" height="57.46" viewBox="0 0 62.93 57.46">
                            <path class="{{ match ($key) {0 => 'fill-yellow',1 => 'fill-beige',2 => 'fill-pink'} }}"
                                d="M4.98 44.73c.28.49.56 1 .82 1.48 5.2 9.68 34.27 17.87 46.74 3.4 7.3-8.48 12.81-14.63 9.31-28.89C60.2 13.98 51.64-.11 33.03.02c0 0-25.31-1.48-32.13 21.4-3 10.05 2.34 20.34 4.08 23.31Z" />
                        </svg>
                        {{ $image->caption }}

                    </div>
                </div>
            @endforeach

            <svg class="absolute bottom-1/2 left-1/2 -z-10 h-auto w-screen max-w-none -translate-x-1/2"
                xmlns="http://www.w3.org/2000/svg" width="795.95" height="111.57" viewBox="0 0 795.95 111.57">
                <path fill="none" stroke="#ffce00" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.15"
                    d="M2.08 77.55c14.73 12.73 40 10.15 51.9-5.29 7.08-9.22 11.08-22.89 22.42-25.43 10.26-2.29 19.36 6.34 26.64 13.92a360.89 360.89 0 0 0 34.49 31.5c3.77 3 8.65 6.12 13.08 4.2 2.7-1.18 4.33-3.91 5.77-6.48l26.32-46.9c3-5.3 6.16-10.82 11.33-14 10.33-6.37 23.76-1 34.08 5.37 0 0 28.56 39.37 42 47.35 20.11 12 53.92 13 35.95-29.1-13.7-32.09 85.81-7.31 96.86-17.25s25.37-18.07 40.08-16c12.58 1.79 15.49 86.63 27.82 89.71 20.54 5.14-1.71-62.05 24.39-50.5 10.66 4.72 26.66 28.34 35.67 20.94 13.25-10.88 36.72-33.61 54.2-31.92 26.39 2.55 26 33.76 49.07 46.79 5.07 2.86 113 62.19 159.77-92.44" />
            </svg>

        </div>
    @endif
</div>
