@props(['item_count', 'mobile_view_count' => 1.25, 'centered_slides' => 'true'])

<div x-cloak x-data="{ swiper: null, showControls: false, showPreviousControl: false, showNextControl: false }" x-init="swiper = new Swiper($refs.container, {
    modules: [window.SwiperMousewheel],
    loop: false,
    slidesPerView: Math.min({{ $item_count }}, {{ $mobile_view_count }}),
    spaceBetween: 15,
    centerInsufficientSlides: true,
    centeredSlides: false,
    mousewheel: {
        enabled: true,
        forceToAxis: true,
    },
    on: {
        progress: function() {
            showPreviousControl = !this.isBeginning;
            showNextControl = !this.isEnd;
        }
    },

    breakpoints: {
        480: {
            slidesPerView: 1.75,
        },
        768: {
            slidesPerView: 2.5,
        },

        1024: {
            slidesPerView: 3.5,
        },
        1600: {
            slidesPerView: 5.5,
        },
    },
})" class="relative mx-auto max-w-none overflow-hidden">

    <div class="swiper-container w-full px-4" x-ref="container">
        <div class="swiper-wrapper flex w-full flex-row" x-bind:class="{ 'gap-4': !swiper }">
            {!! $slot !!}
        </div>
    </div>

    <div class="mt-4 flex flex-row justify-end gap-2 px-4">
        <button x-bind:class="{ 'opacity-50': !showPreviousControl }" :disabled="!showPreviousControl"
            x-on:click="swiper.slidePrev()" class="z-10 transition">
            @svg('arrow-right', 'rotate-180 h-10 w-10')
        </button>
        <button x-bind:class="{ 'opacity-50': !showNextControl }" :disabled="!showNextControl"
            x-on:click="swiper.slideNext()" class="z-10 transition">
            @svg('arrow-right', 'h-10 w-10')
        </button>
    </div>

</div>
