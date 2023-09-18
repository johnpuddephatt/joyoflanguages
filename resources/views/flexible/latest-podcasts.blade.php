<div class="{{ $class ?? 'mx-auto max-w-6xl' }} container py-16 lg:grid lg:grid-cols-2">
    <div>
        <h2 class="bold-text-light-teal type-lg text-teal">{!! Str::inlineMarkdown($layout->title) !!}</h1>
            <div class="prose prose-lg mb-12 max-w-lg">{!! $layout->description !!}</div>

            <div class="space-y-2">
                @foreach ($layout->podcasts as $podcast)
                    <div class="relative flex max-w-lg justify-between gap-2 border-b border-light-teal pb-4 pt-2">
                        <div>
                            @if ($podcast->episode_number)
                                <div class="mb-0.5 font-bold">Episode {{ $podcast->episode_number }}</div>
                            @endif
                            <p class="text-lg font-semibold leading-tight">{{ $podcast->title }}</p>
                        </div>
                        <x-button-link class="my-auto px-4 shadow-yellow after:absolute after:inset-0"
                            href="{{ $podcast->url }}">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="53.66" height="66.6"
                                viewBox="0 0 53.66 66.6">
                                <path vector-effect="non-scaling-stroke" fill="#ffd800" stroke="#12171e"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M48.92 27.93a6.62 6.62 0 0 1 0 10.75L29.59 51.23 10.25 63.78c-3.67 2.39-8.27-.59-8.27-5.37V8.2c0-4.78 4.6-7.76 8.27-5.37l19.34 12.55Z" />
                            </svg>

                        </x-button-link>
                    </div>
                @endforeach
            </div>

            <x-button-link class="mt-16 shadow-light-teal"
                :href="$layout->button_url ?? $language->podcasts_link">{{ $layout->button_text ?? 'Read more' }}</x-button-link>
    </div>
    <div class="hidden lg:block">

        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="449.44"
            height="704.48" viewBox="170 0 429.44 704.48"
            class="mx-auto h-auto w-full max-w-xs rounded-3xl bg-blue py-12 shadow-2xl">
            <defs>
                <clipPath id="prefix__podcasts__clip-path" transform="translate(-1390.23 -5408.8)">
                    <path fill="none"
                        d="M1944.83 5497.12c-33.95-39-95.12-59.37-138.4-59.4-58.32 0-118.73 10.08-164.26 48.53-54.56 46.08-72.33 107.67-74.49 146.59-3.28 59 16 108.59 53 146.45s85 57.1 143.82 57.7a231.79 231.79 0 0 0 61.25-7.18c95.32 49.6 138.16 14.53 107.92-7.54-10.27-7.5-13.76-25.89-13.77-47.37q55.44-55.68 65.38-139.88c7-59.15-6.5-98.9-40.45-137.9Z" />
                </clipPath>
                <style>
                    .prefix__podcasts__cls-4 {
                        fill: #fff
                    }
                </style>
            </defs>
            <g clip-path="url(#prefix__podcasts__clip-path)">

                <foreignObject x="170" y="20" width="430" height="430"
                    requiredFeatures="http://www.w3.org/TR/SVG11/feature#Extensibility">
                    <x-responsive-image class="w-full" :image="$layout->image" />

                </foreignObject>
            </g>
            <path
                d="M178.05 587.87c0-28.29-.13-56.58 0-84.86.13-21.32 5.38-28 26.44-30.45 18.94-2.24 38.1-2.56 57 .83 12.79 2.29 18.82 8 20.5 20.56a222 222 0 0 1-1.33 65.86c-1.9 11.45-7.32 15.46-19 15.9-3 .11-5.94-.14-8.88.1-7.75.65-13.47 0-12.23-10.58.73-6.23-3.26-10.56-10.36-10.24-6.78.3-8.64 4.65-8.93 10.65-.7 14.54 7.18 23.93 22.34 26.2a51.48 51.48 0 0 0 29.78-4.68c6.37-3 8.48-.72 8.45 5.52-.13 28.61.12 57.23-.53 85.84-.35 15.19-6.2 21.25-21.23 23.66a191.81 191.81 0 0 1-58 .18c-17.85-2.57-23.78-9.36-23.95-27.66-.28-28.94-.08-57.89-.08-86.83ZM300.56 588.44c-1-34.13-1.69-68-3.21-101.83-.4-8.84 2.05-11.76 10.81-11.4 13.47.56 27 .48 40.46 0 8-.27 11.18 2.13 10.66 10.69-3.61 59.13-3 118.33-1.51 177.51.25 9.53.8 19.06 1.5 28.57.47 6.37-2.09 8.94-8.5 8.85-14.8-.23-29.61-.35-44.41.05-7.74.2-9.29-3.13-9-10.16 1.3-34.15 2.17-68.34 3.2-102.28ZM328.24 459.74h-2c-30.31.45-35.2-9.34-31.93-39.7 1-9 7.32-13.82 15.77-15.33a103.3 103.3 0 0 1 35.34-.1c9.44 1.57 15.25 7.22 16.57 16.94a76.63 76.63 0 0 1 .78 8.82c.4 21.41-6.36 28.53-27.66 29.25-2.29.08-4.6 0-6.9 0ZM473.77 690.2c-3.14-48.62-2.19-97.33-2.54-146-.09-12.84-.57-25.66-3.13-38.29s-6.91-24.85-20-29.73c-22.89-8.54-45.19-6.83-65.69 7.56-3.84 2.7-7.08 6.09-6.7 11.35a424.72 424.72 0 0 1 .61 57.19c-.31 4.9 1.79 6.81 6.56 3.89 7-4.31 14.36-8.24 22.45-9.87 6.7-1.35 16.48-6.19 19.4 2.21 3.27 9.43-7.77 10.25-14.08 12.45-15.24 5.33-28.18 13.38-34.09 29.06-11.19 29.68-11.49 59.81-1.17 89.76 4.2 12.15 12.33 21.16 26.13 22.49s26.51-.69 34.5-18.91c2.69 20.42 15.68 17.07 27.11 17.56 8.06.28 11.23-2.2 10.64-10.72Zm-46.75-102.38c-.19 5.9-.45 10.79-2.47 15.4-1.87 4.26-5.22 5.65-9.56 4.86-4.16-.76-5.81-3.65-6.26-7.66-1-8.55 6.84-20 15-20.29 7.24-.25 1.04 6.17 3.33 7.69ZM491.05 674.33c1.44 18.63 7.9 25.37 26.43 28.59 11.42 2 23 1.11 34.45 1 33.58-.23 42.21-8.67 42.35-42 .21-49.63.11-99.27 0-148.9a141.1 141.1 0 0 0-1.63-17.61c-1.67-12.76-9.3-19.85-21.72-22.06a169 169 0 0 0-52.06-.77c-20.27 2.69-27.13 9.66-27.77 30.24-.88 28.23-.22 56.51-.22 84.77-.28 28.91-2.11 57.86.17 86.74Zm41-84.57c1.13-6.68 4.14-11.08 11.48-11s10.19 5 11.06 11.48c.34 2.6.29 5.25.46 8.61a65.5 65.5 0 0 1-.82 9.07c-1.22 5.65-4.28 9.4-10.79 9.38-6.28 0-9.61-3-11-9a47.34 47.34 0 0 1-.36-18.54Z"
                class="prefix__podcasts__cls-4" />
            <path d="M494.12 486.2s3.89-5.25-5.47-11.93 4.9-17.82 36.08 0" class="prefix__podcasts__cls-4" />
        </svg>

    </div>
</div>
