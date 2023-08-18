    @include('flexible.text-with-image', ['layout' => $layout])
    <div class="{{ $layout->background_colour ?? '' }}">

        <div class="container mx-auto w-full max-w-6xl overflow-hidden py-12">
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

        </div>
    </div>
