    <div
        class="{{ $class ?? 'mx-auto max-w-6xl' }} @if ($layout->show_thumb) !pb-24 lg:!pb-32 @endif container relative py-8 lg:py-16">

        <div
            class="bg-{{ $layout->colour ?? 'teal-light' }} {{ $layout->reverse ? 'lg:mr-8' : 'lg:ml-8' }} relative flex w-full flex-col lg:flex-row lg:items-center lg:py-10">
            <div class="{{ $layout->reverse ? 'lg:-mr-16' : 'lg:-ml-16' }} relative w-full lg:w-1/2">
                <x-responsive-image :image="$layout->image" class="h-auto w-full" />

            </div>
            <div class="{{ $layout->reverse ? 'lg:order-first lg:pr-12' : 'lg:pl-12' }} px-4 py-4 lg:px-8 2xl:py-8">
                <h2 class="type-lg !mb-4 max-w-lg">{!! $layout->title !!}</h2>
                @if ($layout->subtitle)
                    <div class="type-xs lg:max-w-xs">{{ $layout->subtitle }}
                    </div>
                @endif
                @if ($layout->description)
                    <div class="prose-standout prose mb-8 lg:max-w-md">@markdown($layout->description)</div>
                @endif

                @if ($layout->button_url || $layout->button_2_url)

                    <div class="mt-6 flex flex-col items-start gap-3 lg:flex-row lg:gap-6">
                        @if ($layout->button_url)
                            <x-button-link class="flex-none shadow-yellow"
                                :href="$layout->button_url">{{ $layout->button_text ?? 'Read more' }}</x-button-link>
                        @endif

                        @if ($layout->button_2_url)
                            <x-button-link class="flex-none shadow-white"
                                :href="$layout->button_2_url">{{ $layout->button_2_text ?? 'Read more' }}</x-button-link>
                        @endif
                    </div>
                @endif
            </div>

            @if ($layout->show_sun)
                <svg xmlns="http://www.w3.org/2000/svg" width="648.05" height="519.42"
                    class="absolute right-0 top-0 hidden w-56 -translate-y-1/2 lg:block lg:translate-x-1/3"
                    viewBox="0 0 648.05 519.42">
                    <defs>
                        <style>
                            .cls-2fetgdfdf {
                                fill: #12171e
                            }
                        </style>
                    </defs>
                    <path fill="#ffd800"
                        d="M394.36 517.76a1.72 1.72 0 0 0 3.24.74c17.94-33.86 25.81-129.73 30.61-111.49 2.3 8.74 46.38 65.67 52.79 77.52s5.58 21.47 9 15.71c18.27-34.29-10.89-82.36-18.26-102.87s4.16-34.28 6.09-27.23c10.25 38.13 70.49 53.51 79.47 61.2s13.78 29.16 13.78 12.18-17-46.15-36.21-59.61-35.57-63.12-28.2-45.18 58.64 20.51 77.22 18.91 42.62 21.47 42 11.53-12.5-33-24.35-34.28c-46.15-8-87.16-57-75.31-45.83s42 1.61 59.93 1.61 43.58-27.88 54.15-25.32 10.9-2.88-2.24-12.5-81.39-7-88.12-7.37-21.15-7.37 1.92-10.25 49-42.3 56.4-51.27 41-5.45 19.86-13.46-39.41-1.92-60.24 9-44.86 8.65-52.87 9 23.07-33.32 31.08-35.57 25-48.06 28.84-55.43 20.51-14.74 20.51-18.59-13.46-2.56-33.65 1.92-19.54 50.31-43.26 48.39-30.76 10.58-39.09 12.5-2.57-8-2.57-8c11.54-12.18 15.39-51.27 16-76.27s18.58-32.68 4.48-31.4-42.62 28.2-42.3 51.27c.19 13.47-34 56.4-30.76 35.89 4.18-26.72 1.92-39.74-16.29-72.32-7.16-12.81 4.11-42.4-8.06-36s-17.31 48.58-17.31 62.81c0 25-12.81 45.5-12.81 45.5-27.56 23.69-30.13-35.89-30.13-35.89.32-23.07-28.19-50-42.29-51.27s3.84 6.41 4.48 31.4 4.49 64.09 16 76.27c0 0 5.77 9.93-2.56 8s-15.38-14.42-39.09-12.5-23.08-43.9-43.26-48.39-33.65-5.76-33.65-1.92 16.66 11.22 20.51 18.59 20.83 53.19 28.84 55.43 39.09 35.89 31.08 35.57-32 1.93-52.87-9-39.1-17-60.25-9 12.5 4.48 19.87 13.46 33.33 48.38 56.4 51.27 8.65 9.93 1.92 10.25-75-2.24-88.12 7.37-12.82 15.06-2.24 12.5 36.21 25.32 54.15 25.32 48.07 9.61 59.93-1.61-29.16 37.82-75.31 45.83c-11.86 1.28-23.71 24.35-24.35 34.28s23.39-13.13 42-11.53 69.85-1 77.22-18.91-9 31.73-28.2 45.18-36.21 42.62-36.21 59.61 4.81-4.49 13.78-12.18 69.22-23.07 79.47-61.2c1.93-7 13.46 6.72 6.09 27.23s-36.53 68.58-18.26 102.87c3.39 5.76 2.56-3.85 9-15.71s62.16-62.16 61.84-82 28.2 29.34 21.79 91.51Z" />
                    <ellipse cx="2276.37" cy="1802.11" class="cls-2fetgdfdf" rx="4.61" ry="7.17"
                        transform="rotate(-3.32 -25773.551 32705.598)" />
                    <ellipse cx="2201.4" cy="1802.62" class="cls-2fetgdfdf" rx="4.61" ry="7.17"
                        transform="rotate(-3.32 -25848.509 32706.188)" />
                    <path
                        d="M389.01 227.66s-13 54.49 4 57.73 20.21-55.16 20.21-55.16m-43.12 66.51s32.85 23.44 50.66-.84"
                        style="fill:none;stroke:#12171e;stroke-linecap:round;stroke-linejoin:round;stroke-width:9.34px" />
                    @if ($layout->show_sun_speech_bubble)
                        <g class="translate-y-6">
                            <path fill="#629ce4"
                                d="M189.52 105.98q10.15-39.7-9.44-69.4T120.77 1.15Q81.05-4.59 47.08 18.37t-44 62.39q-10 39.42 11.84 68.62t61.88 35a106.45 106.45 0 0 0 28.29.46c40.31 28.33 61.92 15 49.52 3.14-4.22-4-4.67-12.62-3.37-22.39q28.63-21.99 38.28-59.61Z" />
                            <text fill="#fff" font-family="Brandon Text" font-size="52.2" font-weight="800"
                                transform="rotate(-13.45 557.072 -104.392)">Ciao!</text>
                        </g>
                    @endif
                </svg>
            @elseif ($layout->speech_bubble)
                <svg xmlns="http://www.w3.org/2000/svg" width="192.89" height="201.61"
                    class="absolute -top-4 left-2 h-auto w-16 lg:w-20 xl:-left-6" viewBox="0 0 192.89 201.61">
                    <path fill="#ffd800"
                        d="M189.43 105.93q10.14-39.69-9.44-69.37T120.71 1.15Q81.02-4.58 47.06 18.37T3.13 80.72q-10 39.4 11.83 68.59t61.85 35a106.38 106.38 0 0 0 28.28.46c40.29 28.31 61.89 15 49.49 3.14-4.21-4-4.67-12.61-3.36-22.38q28.56-21.96 38.21-59.6Z" />
                    <text fill="#181919" font-family="Brandon Text" font-size="52.18" font-weight="800"
                        transform="rotate(-13.45 556.845 -104.29)">{{ $layout->speech_bubble }}</text>
                </svg>
            @endif

            @if ($layout->show_thumb)
                <svg class="absolute left-1/2 top-full h-auto w-32 -translate-x-[90%] -translate-y-12"
                    xmlns="http://www.w3.org/2000/svg" width="267.14" height="300.62" viewBox="0 0 267.14 300.62">
                    <defs>
                        <style>
                            .ajas82jda__cls-2 {
                                fill: none;
                                stroke: #12171e;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                                stroke-width: 3.97px
                            }
                        </style>
                    </defs>
                    <path fill="#f3b5ba"
                        d="M255.36 101.35c-.91-2.23-1.76-4.49-2.58-6.75-16-44-133.6-96.28-195-42.86-36 31.29-63 53.88-56.91 116.17 2.86 29.41 30.33 94.05 108.89 104.89 0 0 105.85 21.67 148.58-70.64 18.77-40.56 2.54-87.21-2.98-100.81Z" />
                    <path
                        d="M172.23 298.64s12.7-31.27 21.17-59 2.6-67.08-9.77-107.13-11.84-38.53-1.76-80.45c5.53-23 30.74-50.44 1.11-50.12s-47.87 86.6-47.87 86.6-.17 5.87-2.85 6.19-50.62-21.67-68.47-11.72c-9 5-21.17 27 15.31 42.33s43.31 1.63 43-12.37-36.8-16.28-36.8-16.28"
                        class="ajas82jda__cls-2" />
                    <path
                        d="M57.15 108.95s-15.5-1.47-14.85 13.84 25.4 39.07 71.31 37.12c18.65-1.95 19.81-21.18 2.26-30.62"
                        class="ajas82jda__cls-2" />
                    <path d="M51.66 140.45s-15.88 6-6.43 19.57 20.19 27.9 62.85 19.1c9.44-3.25 13.35-10.42 5.53-19.21"
                        class="ajas82jda__cls-2" />
                    <path
                        d="M50.35 166.95s-15.22 3.07-12 16.74 19.86 19.87 45.27 17.59 15.89-20.63 15.89-20.63m-39.95 21.08s1 13.21 46.89 12.89c16.93-1.63 22.62 6.51 21.9 23.77s-14.41 38.43-14.41 38.43"
                        class="ajas82jda__cls-2" />
                </svg>
            @endif
        </div>
    </div>
