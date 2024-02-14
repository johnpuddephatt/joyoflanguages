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
            spaceBetween: 15,
            centeredSlides: false,

            slidesPerView: {{ $item_count }},
        },

    },
})" class="relative mx-auto max-w-none overflow-hidden">

    <div class="swiper-container container mx-auto w-full" x-ref="container">
        <div class="swiper-wrapper flex w-full flex-row" x-bind:class="{ 'gap-4': !swiper }">
            {!! $slot !!}
        </div>
    </div>

    <button x-bind:class="{ 'opacity-0': !showPreviousControl }" :disabled="!showPreviousControl"
        x-on:click="swiper.slidePrev()" class="absolute left-2 top-1/2 z-10 -translate-y-1/2">
        @svg('arrow-right', 'rotate-180 h-10 w-10')
    </button>
    <button x-bind:class="{ 'opacity-0': !showNextControl }" :disabled="!showNextControl" x-on:click="swiper.slideNext()"
        class="absolute right-2 top-1/2 z-10 -translate-y-1/2">
        @svg('arrow-right', 'h-10 w-10')
    </button>

</div>
