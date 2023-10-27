<div class="{{ $layout->background_colour ?? null }} relative antialiased">
    <div
        class="{{ $class ?? 'mx-auto' }} container flex-row pt-16 lg:flex lg:grid-cols-2 lg:pb-8 lg:pt-24 2xl:pb-16 2xl:pt-32">
        <div class="flex w-[45%] flex-col">
            <h2 class="type-xl mb-6">{!! $layout->title !!}</h2>
            <div class="type-xs !mb-12 max-w-lg lg:mb-16">
                @markdown($layout->description)
            </div>
            <div class="relative">

                <svg class="-right-2 -top-8 hidden h-auto w-[calc(100%+12rem)] lg:absolute lg:block"
                    xmlns="http://www.w3.org/2000/svg" width="547.35" height="330.37" viewBox="0 0 547.35 330.37">
                    <path
                        d="M1.92 211.63c6.87-16.81 21-34.86 38.94-31.82 12.44 2.11 20.66 13.64 28.14 23.81s17.65 20.85 30.24 19.92c16.6-1.22 24.22-20.48 34.4-33.65 21.37-27.65 52.76-41.63 69.21-10.8 10.27 19.26-33 73.06-36.38 107.85 0 0-12.41 55.63 53.07 6.85 15.83-11.56-5.14-24-16.69-15s-10.7 44.5 15 49.64M413.71 34.08c6.87-16.81 21-34.87 38.94-31.82 12.45 2.11 20.67 13.64 28.14 23.81s17.65 20.84 30.24 19.92c16.6-1.23 24.22-20.48 34.41-33.65"
                        style="fill:none;stroke:#fff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3.84px" />
                </svg>
                <x-library-image class="mt-auto block w-full" conversion="3x2" :image="$layout->image" />

            </div>

        </div>
        @if ($layout->checklist)
            <div class="w-[55%] space-y-6 max-lg:mt-16 lg:pl-12 2xl:pl-24">
                @foreach ($layout->checklist as $checklistItem)
                    <div class="flex flex-row gap-2 2xl:gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-0 mt-1 h-12 w-12 2xl:h-16 2xl:w-16"
                            width="43.29" height="40.16" viewBox="0 0 43.29 40.16">
                            <path fill="{{ $layout->background_colour == 'bg-yellow' ? '#ffffff' : '#ffce00' }}"
                                d="M6.17 29.31c.13.32.24.65.36 1 2.18 6.42 19 14.34 28.09 6.8 5.31-4.42 9.28-7.61 8.59-16.64A18 18 0 0 0 27.77 4.95S12.52 1.49 6.05 14.73c-2.84 5.79-.64 12.59.12 14.58Z" />
                            <g fill="none" stroke="#151616" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.77px">
                                <circle cx="19.08" cy="19.08" r="18.19" />
                                <path d="m13.84 17.62 5.1 6.52L29.73 9.1" />
                                <path d="M31.54 18.98a12.41 12.41 0 1 1-7.77-11.5" />
                            </g>
                        </svg>

                        <div class="flex-1">
                            <h3 class="type-sm">{{ $checklistItem->title }}</h3>
                            <div class="prose prose-lg !leading-snug tracking-normal">@markdown($checklistItem->description)</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
