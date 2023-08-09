<div class="overflow-hidden py-16">
    <div
        class="bg-{{ $layout->colour ?? 'teal-light' }} {{ $class ?? 'mx-auto max-w-7xl' }} container relative mb-24 block py-8 md:grid md:grid-cols-2 lg:py-16">

        <x-responsive-image :image="$layout->image"
            class="{{ $layout->reverse ? 'lg:-mr-24' : 'lg:-ml-24' }} max-w-none lg:w-[calc(100%+4rem)]" />

        <div
            class="{{ $layout->reverse ? 'order-first' : null }} relative z-10 flex flex-col items-start justify-center px-8 py-8">
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

        @if ($layout->show_sun)
            <svg class="absolute right-0 top-0 block w-72 -translate-y-1/4 translate-x-1/3"
                xmlns="http://www.w3.org/2000/svg" width="461.59" height="474.59" viewBox="0 0 461.59 474.59">
                <path fill="#ffd800"
                    d="M228.03 473.07a1.58 1.58 0 0 0 3 .68c16.52-31.18 23.77-119.44 28.19-102.65 2.12 8 42.7 60.46 48.6 71.38s5.13 19.76 8.26 14.45c16.82-31.57-10-75.82-16.82-94.7s3.84-31.57 5.61-25.08c9.44 35.11 64.9 49.27 73.16 56.35s12.69 26.85 12.69 11.21-15.64-42.48-33.34-54.87-32.75-58.12-26-41.6 54 18.88 71.1 17.41 39.24 19.76 38.65 10.62-11.51-30.39-22.42-31.57c-42.49-7.37-80.25-52.51-69.33-42.19s38.64 1.48 55.17 1.48 40.12-25.67 49.85-23.31 10-2.65-2.06-11.5-74.94-6.5-81.13-6.79-19.47-6.79 1.77-9.44 45.14-38.94 51.92-47.2 37.76-5 18.29-12.39-36.28-1.78-55.46 8.26-41.3 8-48.68 8.26 21.24-30.69 28.62-32.75 23-44.25 26.55-51 18.88-13.57 18.88-17.11-12.39-2.36-31 1.77-18 46.32-39.82 44.55-28.33 9.73-36 11.5-2.36-7.37-2.36-7.37c10.62-11.21 14.16-47.21 14.75-70.22s17.12-30.09 4.13-28.91-39.23 26-38.94 47.2c.17 12.41-31.27 51.93-28.32 33.05 3.84-24.6 1.77-36.59-15-66.58-6.59-11.8 3.79-39-7.42-33.14s-15.93 44.72-15.93 57.82c0 23-11.8 41.9-11.8 41.9-25.38 21.81-27.74-33.05-27.74-33.05.3-21.24-26-46-38.94-47.2s3.54 5.9 4.13 28.91 4.13 59 14.75 70.22c0 0 5.31 9.14-2.36 7.37s-14.16-13.27-36-11.5S97.99 74.92 79.4 70.79s-31-5.31-31-1.77 15.34 10.32 18.88 17.11 19.17 49 26.55 51 36 33 28.62 32.75-29.51 1.77-48.68-8.26-36-15.64-55.47-8.26 11.51 4.13 18.29 12.39 30.69 44.54 51.93 47.2 8 9.14 1.77 9.44-69-2.07-81.13 6.79-11.8 13.86-2.07 11.5 33.34 23.31 49.86 23.31 44.25 8.85 55.17-1.48-26.85 34.82-69.33 42.19c-10.92 1.18-21.83 22.42-22.42 31.57s21.53-12.1 38.65-10.62 64.31-.89 71.1-17.41-8.26 29.21-26 41.6-33.33 39.24-33.33 54.87 4.42-4.13 12.68-11.21 63.73-21.24 73.17-56.35c1.77-6.49 12.39 6.2 5.6 25.08s-33.63 63.13-16.81 94.7c3.12 5.31 2.36-3.54 8.26-14.45s57.23-57.24 56.94-75.53 26 27 20.06 84.25Z" />
                <ellipse cx="2061.03" cy="2910.28" fill="#12171e" rx="4.24" ry="6.6"
                    transform="rotate(-3.32 -45461.937 32463.616)" />
                <ellipse cx="1992.01" cy="2910.75" fill="#12171e" rx="4.24" ry="6.6"
                    transform="rotate(-3.32 -45530.846 32464.037)" />
                <path
                    d="M223.11 205.98s-11.94 50.17 3.64 53.15 18.61-50.78 18.61-50.78M205.72 269.59s30.24 21.58 46.63-.77"
                    fill="none" stroke="#12171e" stroke-width="8.6px" />
            </svg>
        @endif

    </div>
</div>
