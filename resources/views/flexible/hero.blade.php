<div id="{{ $layout ? $layout->key() : null }}"
    class="{{ $layout->background_colour }} {{ in_array($layout->background_colour, ['bg-teal']) ? 'text-white' : null }} relative flex min-h-screen flex-col items-center justify-center gap-4 overflow-hidden pt-16 lg:h-screen lg:flex-row lg:pt-12">

    <div class="container-lg relative z-10 mx-auto w-full">
        <div class="lg:w-1/2">
            <h1 class="type-xl mb-6">{!! nl2br($layout->title) !!}</h1>
            <p class="type-xs max-w-xs lg:max-w-md">{!! nl2br($layout->subtitle) !!}</p>

            @if ($layout->button_url)
                <x-button-link class="mt-6 text-lg shadow-white"
                    href="{{ $layout->button_url }}">{{ $layout->button_text ?? 'Read more' }}</x-button-link>
            @endif
        </div>
    </div>

    <div class="bottom-0 right-0 top-0 w-full lg:absolute lg:h-full lg:w-[55%]">

        @if ($layout->show_shapes)
            <div class="absolute right-0 top-1/2 -z-10 w-[50%] -translate-y-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 341.4 374.7">
                    <path fill="#ffd800"
                        d="M309.9 70.6c37.8 52.7 39.8 128.7 15.4 184.1-24.3 55.4-75 90.1-125.4 107.4-50.4 17.4-100.4 17.4-136.2-3.3-35.7-20.7-57.2-62-62.4-102.1-5.2-40.2 5.8-79 29.1-128.3C53.6 79.1 89.1 19.3 143.7 4.1 198.3-11.2 272 18 309.9 70.6z">
                    </path>
                </svg>
            </div>
        @endif

        <x-responsive-image class="top-[55%] block h-auto w-full lg:absolute lg:-translate-y-1/2" :image="$layout->image" />

    </div>

    @if ($layout->show_shapes)
        <!-- top right turquoise circle -->
        <svg class="absolute right-0 top-0 hidden w-[20vw] -translate-y-1/3 translate-x-1/3 transform lg:block"
            xmlns="http://www.w3.org/2000/svg" width="565.69" height="539.98" viewBox="0 0 565.69 539.98">
            <path fill="#4badb8"
                d="M565.6 260.08c-.13-5.15-.12-10.3-.05-15.45 1.23-100-194.35-293.55-357.54-233.19-95.62 35.37-166.7 60.11-201.7 189.27-16.51 61-10.47 211 138.42 292.09 0 0 195.27 123.38 350.53-28.88 68.26-66.91 71.11-172.49 70.34-203.84Z" />
        </svg>

        <!-- bottom left turquoise circle -->
        <!--<svg class="absolute bottom-0 left-0 hidden w-96 -translate-x-1/2 translate-y-1/2 transform lg:block"
        xmlns="http://www.w3.org/2000/svg" width="573.42" height="523.4" viewBox="0 0 573.42 523.4">
        <path fill="#4badb8"
            d="M525.4 111.61c-2.68-4.39-5.23-8.86-7.75-13.36-48.86-87.31-314.91-157.39-426.2-23.64C26.23 152.98-23 209.89 11.15 339.27c16.12 61.06 96.23 188.07 265.72 184 0 0 230.79 9.46 289.35-200 25.73-91.96-24.49-184.87-40.82-211.66Z" />
        </svg>-->

        <div class="absolute bottom-0 left-0 hidden -translate-x-1/3 translate-y-1/3 transform lg:block">
            <div class="tk-blob text-light-teal w-[20vw]" style="--time: 120s; --amount: 5;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 747.2 726.7">
                    <path fill="currentColor"
                        d="M539.8 137.6c98.3 69 183.5 124 203 198.4 19.3 74.4-27.1 168.2-93.8 245-66.8 76.8-153.8 136.6-254.2 144.9-100.6 8.2-214.7-35.1-292.7-122.5S-18.1 384.1 7.4 259.8C33 135.6 126.3 19 228.5 2.2c102.1-16.8 213.2 66.3 311.3 135.4z">
                    </path>
                </svg>
            </div>
        </div>
    @endif

</div>
