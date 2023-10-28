@php
    if (!isset($layout) || !$layout->form_action) {
        $layout = (object) [
            'title' => nova_get_setting('newsletter_title', 'Subscribe to our newsletter'),
            'description' => nova_get_setting('newsletter_description', 'Get the latest news and updates from us, straight to your inbox.'),
            'placeholder' => nova_get_setting('newsletter_placeholder', 'Your email address'),
            'form_action' => nova_get_setting('newsletter_form_action'),
            'button_text' => nova_get_setting('newsletter_button_text', 'Subscribe'),
            'sticker' => nova_get_setting('newsletter_sticker'),
        ];
    }
@endphp

@if ($layout->form_action)
    <form action="{{ $layout->form_action }}" method="POST">
        @csrf
        <div>
            <div
                class="{{ $background ?? 'bg-yellow' }} relative flex min-h-[50vh] w-full flex-col justify-center overflow-hidden">
                <div class="container relative z-10 mx-auto pb-64 pt-40 text-center lg:py-16">
                    <h2 class="type-lg mx-auto !mb-4 max-w-xl">{{ $layout->title }}</h2>
                    <div class="type-xs mx-auto !mb-12 max-w-xl">{!! $layout->description !!}</div>

                    <input class="mx-auto mb-6 block w-full max-w-sm rounded-full px-8 py-3 text-center text-lg"
                        type="email" placeholder="{{ $layout->placeholder }}">

                    <x-button class="shadow-light-teal" type="submit">{{ $layout->button_text }}</x-button>
                    @if ($layout->sticker)
                        <div class="absolute right-4 top-4 z-10 w-32 lg:bottom-4 lg:right-24 lg:top-auto lg:w-48">
                            <svg xmlns="http://www.w3.org/2000/svg" width="276.93" height="270.49"
                                class="block h-auto w-full" viewBox="0 0 276.93 270.49">
                                <path fill="#4ba7b2"
                                    d="M272.95 166.86c.64-2.46 1.34-4.91 2.07-7.34C289.19 112.18 222.6-6.24 136.92.26c-50.2 3.81-87.3 5.91-121.44 62.49-16.11 26.7-33.62 98.75 26.06 157.47 0 0 76 85.09 170.36 33.88 41.47-22.51 57.16-72.25 61.05-87.24Z" />
                            </svg>

                            <p
                                class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 rotate-[10deg] text-lg font-bold leading-none text-white">
                                {{ $layout->sticker }}
                            </p>

                        </div>
                    @endif
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-3 left-0 right-0 h-auto w-full"
                    xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" viewBox="0 0 2565.1 811.8">
                    <defs>
                        <path id="a" d="M0 0h2565.1v811.8H0z" />
                    </defs>
                    <clipPath id="b">
                        <use xlink:href="#a" overflow="visible" />
                    </clipPath>
                    <g clip-path="url(#b)">
                        <path fill="#fff"
                            d="M667.3 415.1c-.2-6.9-.2-13.8-.1-20.7C668.9 260.4 406.9 1.2 188.3 82 60.2 129.4-35 162.5-81.9 335.6c-22.1 81.7-14 282.6 185.4 391.3 0 0 261.6 165.3 469.6-38.7 91.4-89.7 95.2-231.1 94.2-273.1zm2053.2 41.1c2.8-4.5 5.7-9 8.7-13.4 57.7-85.6-1.5-363.2-176.4-403.5-102.5-23.6-177.8-42.5-281.1 49.1-48.7 43.2-128.5 176-46 330.3 0 0 98.6 217 318.7 173.5 96.8-19.1 159-108.5 176.1-136z" />
                    </g>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="487.84" height="528.68"
                    class="absolute bottom-0 right-0 h-auto w-48 lg:left-24 lg:right-auto lg:w-64 2xl:w-72"
                    viewBox="0 0 487.84 528.68">
                    <defs>
                        <style>
                            .prefix__newsletter__cls-1 {
                                fill: none;
                                stroke: #12171e;
                                stroke-width: 6.18px;
                                stroke-linecap: round;
                                stroke-linejoin: round
                            }
                        </style>
                    </defs>
                    <path
                        d="m262.83 229.85-56.52 16.26c-26.25 7.55-44.45 13-62.92 33.1-9.78 10.67-13.51 15.55-25.14 33.1m281.24 105.31.93 48.91h84.3s1-49.36-8.41-115.6c-2.83-19.85-13.87-44.17-24.17-63.47-8.91-16.7-21.24-26.27-38.95-35.41a111.27 111.27 0 0 0-27-9.76l-56.06-12.44v-28.82s28.73-5.15 44.51-17 16.3-57.25 14.8-66.67-.85-12.29 1.81-14.65.94-4.56-6.08-7-23.88-46.08-23.88-46.08"
                        class="prefix__newsletter__cls-1" />
                    <path
                        d="M122.13 342.2c0-24.06-14.4-85-14.71-91.87-1.17-7.36-14-39.87-19.72-54a4.72 4.72 0 0 0-9 .57 18.89 18.89 0 0 0-.42 5.47c1 8.7 1 10.54 2.92 19.06l-25.58-26.91c-6-7.55-15.64-18.67-20.3-16.65s-.34 4.91 3.19 12.13 8.3 16.87 8.78 17.29-17.44-17.32-26.28-23.37c-8.74.41 4.12 18.44 10.52 24.85 0 0-23-17.94-22.54-10.18.32 6.11 20.12 24.45 18.1 25.74s-17.43-9-22.26-8.15c-2.7.49-2.64 4.78 2.41 10.52s49.78 53.44 57.58 59.38c.27 35.88-33.64 189-11.06 214.38 5.79 6.26 36.67 6.88 51.26 6.34 0 0 19.37 1 19.3-35.23-.06-45.64-2.19-129.37-2.19-129.37Zm2.15 116.45 49.9-.38"
                        class="prefix__newsletter__cls-1" />
                    <path d="M105.06 506.73c1.16-1.44 59.66 1.8 69.12-48.45m230.49 8.24v59.07m74.97-58.46v58.46"
                        class="prefix__newsletter__cls-1" />
                    <path fill="none" stroke="#12171e" stroke-miterlimit="10" stroke-width="6.18"
                        d="M361.25 144.04s-15.91 5.21-17.43-11.57" />
                    <ellipse cx="482.47" cy="7748.57" fill="#12171e" rx="3.2" ry="4.98"
                        transform="rotate(-17.69 -24157.549 4375.27)" />
                    <path
                        d="M361.25 38.34s-25.38-52.23-51.4-29.53c-19.54 17-48.15-.19-48.15-.19-23.24-11.11-60.23-1.08-65.41 37.59-6.11 45.72-21.51 42.27-34.89 43.08a36.27 36.27 0 0 1-11.51-1.06c-5.94-1.6-4.76-17.1-2.76-22.11 3.33-8.33 59.57 12.23 28.18 46.4m97.65-10.75c-10.13 15-17.29 13.64-25 8.29-12.34-8.54-27.55-.83-29.91 7.54s4.29 19.74 13.16 23a19.21 19.21 0 0 0 16.22-1.7s-2.84-14 3.27 16.14"
                        class="prefix__newsletter__cls-1" />
                    <path
                        d="M232.03 117.03c8.39-2.09 12.86 7.95 12.86 7.95s-6.43-4.47-11.93-.82M356.3 49.55s-22.22 26.7-42.22 20.94-14.64-1.56-30.6 14.4m-109.3 331.34v109.36"
                        class="prefix__newsletter__cls-1" />
                    <path fill="#fff" stroke="#12171e" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="6.18" d="M149.23 495.34h23.37" />
                    <path
                        d="M115.03 235.3s18.33 25 42.22 17.78c15.83-4.79 18.57-16.4 18.61-23.69a9.49 9.49 0 0 0-8-9.55c-3.66-.52-12 2.58-10.57 11.29 3.39 20.41 42.3 4.17 42.3 4.17M81.71 166.97c-3.33-20.84 24.27-36.48 35.19-7.22 7.46 20 47.71 13.73 43-14-.64-3.8-4.84-8.79-5-20.77-.15-9.8 7.31-15.36 17.23-18"
                        class="prefix__newsletter__cls-1" />
                </svg>

            </div>
        </div>
    </form>
@endif
