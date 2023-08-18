@props(['item_count', 'mobile_view_count' => 1.25, 'centered_slides' => 'true'])

<div x-cloak x-data="{ swiper: null, showControls: false, showPreviousControl: false, showNextControl: false }" x-init="swiper = new Swiper($refs.container, {
    loop: false,
    slidesPerView: Math.min({{ $item_count }}, {{ $mobile_view_count }}),
    spaceBetween: 15,
    centerInsufficientSlides: true,
    centeredSlides: {{ $centered_slides }},

    on: {
        progress: function() {
            showPreviousControl = !this.isBeginning;
            showNextControl = !this.isEnd;
        }
    },

    breakpoints: {

        1024: {
            spaceBetween: 30,
            centeredSlides: false,

            slidesPerView: {{ $item_count }},
        },

    },
})" class="relative mx-auto max-w-none">

    <div class="swiper-container w-full overflow-hidden" x-ref="container">
        <div class="swiper-wrapper flex w-full flex-row" :class="{ 'gap-4': !swiper }">
            {!! $slot !!}
        </div>
    </div>

    <button :class="{ 'opacity-0': !showPreviousControl }" :disabled="!showPreviousControl" @click="swiper.slidePrev()"
        class="absolute left-0 top-1/2 z-10 -translate-y-1/2">
        @svg('arrow-right', 'rotate-180 h-10 w-10')
    </button>
    <button :class="{ 'opacity-0': !showNextControl }" :disabled="!showNextControl" @click="swiper.slideNext()"
        class="absolute right-0 top-1/2 z-10 -translate-y-1/2">
        @svg('arrow-right', 'h-10 w-10')
    </button>

</div>
