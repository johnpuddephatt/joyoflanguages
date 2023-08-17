<div class="relative">
    <div
        class="2xl:container-lg container mx-auto flex min-h-[80vh] flex-col-reverse items-center py-8 pt-48 lg:flex-row lg:pb-36 xl:pt-48 2xl:pt-64">
        <div class="lg:w-1/2">

            <div class="mb-4 text-2xl font-bold text-light-teal">{{ $layout->pretitle }}</div>
            <h1 class="type-xl mb-4 lg:mb-8">
                {!! nl2br($layout->title) !!}
            </h1>
            <div class="text-lg font-semibold">@markdown($layout->description)</div>
        </div>
        <div class="relative w-full lg:w-1/2 lg:pl-8">

            <x-responsive-image conversion="landscape" :image="$layout->image" class="h-auto w-full" />

            <svg class="absolute -bottom-8 -left-12 -right-4 top-8 block h-auto w-[111%] max-w-none"
                xmlns="http://www.w3.org/2000/svg" width="367.14" height="223.72" viewBox="0 0 367.14 223.72">
                <path
                    d="M79.88 43.01C33.01 52.67 43.43-1.93 54.98 7.06S14.41 44.58 1.91 1.92M363.53 221.8c-62.33-41.56 29.32-50.25-7.25-85.05"
                    style="fill:none;stroke:#ffce00;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3.84px" />
            </svg>

        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
        class="pointer-events-none absolute left-0 right-0 top-0 -z-10 h-auto" viewBox="0 0 2676.7 1530.2">
        @if ($layout->show_shape_1)
            <path fill="#f4af6b"
                d="M2393 1047.2c-1.9-3.2-3.8-6.4-5.6-9.7-35.5-63.4-228.6-114.3-309.4-17.2-47.3 56.9-83.1 98.2-58.3 192.2 11.7 44.3 69.9 136.5 192.9 133.6 0 0 167.6 6.9 210.1-145.2 18.6-66.8-17.8-134.3-29.7-153.7z" />
        @endif
        @if ($layout->show_shape_2)
            <path fill="#4dacb7"
                d="M2852.4 158c-.1-5.6-.1-11.2-.1-16.9 1.3-109.2-212-320.3-390.1-254.4-104.3 38.6-181.9 65.6-220 206.5-18 66.5-11.4 230.2 151 318.7 0 0 213 134.6 382.4-31.5 74.5-73 77.7-188.2 76.8-222.4z" />
        @endif
        @if ($layout->show_shape_3)
            <path fill="#ffd703"
                d="M182.1 901.6c-4.1-6.7-8-13.5-11.8-20.4-74.6-133.3-480.8-240.3-650.7-36.1-99.6 119.6-174.7 206.5-122.6 404 24.6 93.2 146.9 287.1 405.7 281 0 0 352.4 14.5 441.8-305.3 39.2-140.5-37.5-282.3-62.4-323.2z" />
        @endif
    </svg>

</div>
