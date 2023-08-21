    @include('flexible.text-with-image', ['layout' => $layout])
    <div class="{{ $layout->background_colour ?? '' }}">

        <div class="container relative mx-auto w-full max-w-6xl overflow-hidden py-12">
            @if ($layout->sticker)
                <div
                    class="absolute right-6 top-0 z-10 flex h-24 w-24 rotate-6 items-center justify-center rounded-full p-4 text-center font-bold leading-none">

                    <svg class="absolute inset-0 -z-10 h-full w-full max-w-none" xmlns="http://www.w3.org/2000/svg"
                        width="62.93" height="57.46" viewBox="0 0 62.93 57.46">
                        <path class="fill-yellow"
                            d="M4.98 44.73c.28.49.56 1 .82 1.48 5.2 9.68 34.27 17.87 46.74 3.4 7.3-8.48 12.81-14.63 9.31-28.89C60.2 13.98 51.64-.11 33.03.02c0 0-25.31-1.48-32.13 21.4-3 10.05 2.34 20.34 4.08 23.31Z" />
                    </svg>
                    {{ $layout->sticker }}

                </div>
            @endif
            <x-swiper :mobile_view_count="2.25" :item_count="count($layout->squares)" centered_slides="false">

                @foreach ($layout->squares as $square)
                    <div class="{{ $layout->background_colour ? 'bg-white' : 'bg-beige' }} swiper-slide flex aspect-square flex-col items-center justify-center p-4 text-center !transition !duration-500 hover:opacity-40"
                        @click="if(!shown) { swiper.slideTo({{ $loop->index }}); $event.preventDefault(); }"
                        x-data="{ shown: false }"
                        :class="{ 'flex-1': !swiper, 'max-lg:opacity-20': !shown, '!opacity-100': shown }"
                        x-intersect:enter.half="shown = true" x-intersect:leave.half="shown = false">
                        <h3 class="mb-2 text-2xl font-bold">{{ $square->title }}</h3>
                        <div class="prose !leading-tight">{{ $square->description }}</div>
                    </div>
                @endforeach

            </x-swiper>

            @if ($layout->addendum)
                <p class="bold-badged mt-8 text-center">@inlineMarkdown($layout->addendum)</p>
            @endif

        </div>
    </div>
