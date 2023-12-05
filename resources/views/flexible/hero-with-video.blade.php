<div
    class="relative flex flex-col items-center justify-center gap-6 bg-white pt-32 lg:h-screen lg:flex-row lg:gap-0 lg:pt-16">

    <div class="container-lg relative z-10 w-full">
        <div class="lg:w-1/2">
            <h1 class="type-xl mb-6">
                {!! nl2br($layout->title) !!}</h1>
            <p class="type-xs max-w-lg">{!! nl2br($layout->subtitle) !!}</p>

            @if ($layout->button_url)
                <x-button-link class="mt-6 text-lg shadow-yellow"
                    :href="$layout->button_url">{{ $layout->button_text ?? 'Sign up' }}</x-button>
            @endif
        </div>
    </div>

    <div x-data="{ playing: {{ $layout->autoplay ? 'true' : 'false' }} }"
        class="relative right-0 top-1/2 -mb-16 ml-auto w-[90%] max-lg:overflow-hidden lg:absolute lg:w-1/2 lg:-translate-y-1/2">
        <div class="relative lg:translate-y-32">
            <svg class="block h-auto w-[150%] max-w-none lg:max-h-[85vh] lg:w-full" xmlns="http://www.w3.org/2000/svg"
                width="1172.89" height="1107.97" viewBox="0 0 1172.89 1107.97">
                <defs>
                    <style>
                        .prefix__cls-70 {
                            stroke: #12171e;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            fill: none;
                            stroke-width: 3.65px
                        }

                        .blur {
                            filter: blur(5px);
                        }
                    </style>
                </defs>
                <path fill="#629ce4"
                    d="M19.76 350.8c1.61 4.2 3.1 8.44 4.55 12.7 28.12 82.65 245.44 184.81 362.12 87.59 68.35-57 119.59-98 110.71-214.48-4.19-55-52.9-176.62-199-199.92 0 0-196.6-44.57-279.92 126-36.67 74.86-8.23 162.55 1.54 188.11Z" />
                <path fill="#ffd200"
                    d="M1273.21 556.08c-.16-6.53-.14-13.05-.06-19.58 1.56-126.77-246.26-372-453-295.47-121.16 44.82-211.21 76.17-255.52 239.83-20.92 77.24-13.27 267.36 175.38 370.11 0 0 247.44 156.33 444.17-36.61 86.4-84.76 90.01-218.55 89.03-258.28Z" />
                <path fill="#f6b16b"
                    d="M402.48 994.89c1.3 3.4 2.5 6.82 3.67 10.26 22.75 66.81 198.37 149.37 292.64 70.79 55.24-46 96.65-79.23 89.47-173.34-3.39-44.42-42.75-142.75-160.84-161.58 0 0-158.89-36-226.24 101.8-29.59 60.55-6.61 131.41 1.3 152.07Z" />

            </svg>

            <div class="absolute left-0 top-0 h-full w-[150%] lg:w-full">

                <x-responsive-image class="absolute left-[25%] top-[2%] h-[72%] w-[32%] object-cover"
                    :image="$layout->image" />

                @if ($layout->video)
                    <video x-cloak x-ref="video" {{ $layout->autoplay ? 'autoplay muted' : null }} x-transition
                        x-show="playing" {!! $layout->autoplay ? null : '@ended="playing = false"' !!}
                        class="absolute left-[25%] top-[2%] h-[72%] w-[32%] object-cover">
                        @if (isset($layout->video->mp4))
                            <source src="{{ Storage::disk('public')->url($layout->video->mp4) }}" type="video/mp4">
                        @endif
                        @if (isset($layout->video->webm))
                            <source src="{{ Storage::disk('public')->url($layout->video->webm) }}" type="video/webm">
                        @endif
                    </video>
                @endif

            </div>

            <svg class="absolute left-0 top-0 block h-full w-[150%] max-w-none lg:max-h-[85vh] lg:w-full"
                xmlns="http://www.w3.org/2000/svg" width="1172.89" height="1107.97" viewBox="0 0 1172.89 1107.97">
                <defs>
                    <style>
                        .prefix__cls-70 {
                            stroke: #12171e;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            fill: none;
                            stroke-width: 3.65px
                        }

                        .blur {
                            filter: blur(5px);
                        }
                    </style>
                </defs>

                <path class="blur"
                    d="M676.61 845.38h.08Zm-19.8-816.14H358.49a55.76 55.76 0 0 0-55.76 55.75v715.56a55.76 55.76 0 0 0 55.76 55.74h298.32a55.75 55.75 0 0 0 55.75-55.74V84.99a55.75 55.75 0 0 0-55.75-55.75Z"
                    opacity=".1" />
                <path fill="#fff" stroke="#12171e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.55"
                    d="M645.43 1.27H329a45.8 45.8 0 0 0-45.66 45.66v744.68A45.8 45.8 0 0 0 329 837.28h316.43a45.8 45.8 0 0 0 45.67-45.67V46.93a45.8 45.8 0 0 0-45.67-45.66Zm18.56 774.61a30 30 0 0 1-27.51 29.78h-303.1a30 30 0 0 1-27.51-29.78V60.3a29.89 29.89 0 0 1 27.91-29.82H378.81a5 5 0 0 1 4.7 4.46V35.51a23.78 23.78 0 0 0 23.75 22.65h155.29a23.78 23.78 0 0 0 23.75-22.65V34.94a5 5 0 0 1 4.7-4.46h45.04a29.89 29.89 0 0 1 27.9 29.82Z" />
                <circle cx="466.69" cy="34.14" r="11.27" fill="#4badb8" stroke="#0a0a0a"
                    stroke-miterlimit="10" stroke-width="2.54" />
                <circle cx="503.16" cy="34.14" r="11.27" fill="#ffd800" stroke="#0a0a0a"
                    stroke-miterlimit="10" stroke-width="2.54" />
                <path fill="#f3b5ba"
                    d="M316.15 455.55c-.83-2-1.61-4.13-2.37-6.21-14.74-40.49-123-88.64-179.54-39.47-33.13 28.82-58 49.61-52.4 107 2.64 27.07 27.93 86.59 100.26 96.57 0 0 97.45 19.95 136.79-65 17.29-37.41 2.35-80.37-2.74-92.89Z" />
                <path
                    d="M239.62 637.2s11.7-28.79 19.49-54.27 2.4-61.76-9-98.64-10.9-35.47-1.62-74.06c5.09-21.16 28.3-46.44 1-46.14s-44.06 79.73-44.06 79.73-.15 5.39-2.62 5.69-46.6-20-63-10.79c-8.34 4.65-19.49 24.89 14.09 39s39.87 1.5 39.57-11.4-33.88-15-33.88-15"
                    class="prefix__cls-70" />
                <path d="M133.67 462.55S119.4 461.2 120 475.29s23.38 36 65.66 34.18c17.16-1.8 18.24-19.51 2.07-28.19"
                    class="prefix__cls-70" />
                <path d="M128.62 491.55s-14.62 5.53-5.92 18 18.59 25.68 57.86 17.58c8.69-3 12.29-9.59 5.1-17.68"
                    class="prefix__cls-70" />
                <path
                    d="M127.43 515.95s-14 2.82-11 15.41 18.29 18.29 41.67 16.19 14.63-19 14.63-19M135.89 547.98s.9 12.16 43.17 11.86c15.59-1.49 20.83 6 20.16 21.89s-13.26 35.38-13.26 35.38"
                    class="prefix__cls-70" />
            </svg>

        </div>

        @if ($layout->video && !$layout->autoplay)
            <button x-show="!playing" @click="playing = true, $refs.video.play()" aria-label="Play video"
                class="absolute bottom-[10%] right-[2%] z-20 w-1/3 lg:right-1/4 lg:w-1/4">
                <svg class="block h-auto w-full" xmlns="http://www.w3.org/2000/svg" width="291.37" height="282.94"
                    viewBox="0 0 291.37 282.94">
                    <path fill="#4badb8"
                        d="M2.89 116.52a204.6 204.6 0 0 1-1.7 7.81c-11.78 50.42 65.46 170 154.66 157.73 52.27-7.21 90.94-11.78 123-73.15 15.15-29 28.84-105.45-37.35-163 0 0-84.92-84.14-180.36-24.51C19.22 47.56 6 100.59 2.89 116.52Z" />
                    <path fill="#fff" stroke="#12171e" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="3.5"
                        d="M220.3 136.28a5.44 5.44 0 0 1 0 9.42l-53.06 30.63-53.05 30.63a5.44 5.44 0 0 1-8.16-4.7V79.72a5.44 5.44 0 0 1 8.16-4.7l53.05 30.63Z" />
                </svg>
            </button>
        @endif

    </div>

    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
        class="pointer-events-none absolute inset-0 left-0 right-0 top-0 hidden w-full lg:block"
        viewBox="0 0 2730.7 1785.7">
        <defs>
            <path id="a" d="M0 0h2730.7v1785.7H0z" />
        </defs>
        <clipPath id="b">
            <use xlink:href="#a" overflow="visible" />
        </clipPath>
        <path fill="#4ea8b2"
            d="M2979.5 136.9c-.1-6-.1-11.9-.1-17.9 1.4-115.7-224.8-339.5-413.5-269.7-110.6 40.9-192.8 69.6-233.2 218.9-19.1 70.5-12.1 244.1 160.1 337.8 0 0 225.8 142.6 405.4-33.4 78.8-77.3 82.1-199.5 81.3-235.7zM277.4 1262.1c-3.1-5.1-6.1-10.2-8.9-15.4-56.5-101-364.2-182.1-492.9-27.4-75.4 90.7-132.3 156.5-92.9 306.1C-298.7 1596-206 1742.9-10 1738.2c0 0 267 11 334.6-231.3 29.7-106.3-28.3-213.8-47.2-244.8z"
            clip-path="url(#b)" />
    </svg>

</div>
