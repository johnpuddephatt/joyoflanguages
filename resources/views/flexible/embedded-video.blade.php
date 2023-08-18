<div class="{{ $layout->background_colour }} relative">

    <svg xmlns="http://www.w3.org/2000/svg" width="102.76" height="257.94" class="absolute -bottom-36 right-0 h-auto w-48"
        viewBox="0 0 102.76 257.94">
        <path fill="#4ba3ae"
            d="M102.52 0C73.3 1.66 32.42 13 9.87 59.12c-16.56 33.9-3.7 73.56.72 85.13.73 1.9 1.4 3.81 2.06 5.74 7.83 23 48 49.34 90.11 56" />
        <path fill="#ffce00"
            d="M.02 214.91v2.56c-.21 16.55 32.15 48.56 59.14 38.58 15.82-5.85 27.58-9.95 33.37-31.31 2.73-10.09 1.73-34.91-22.9-48.33 0 0-32.31-20.41-58 4.78C.36 192.26-.11 209.73.02 214.91Z" />
    </svg>

    <div class="{{ $class ?? 'mx-auto max-w-6xl' }} container relative pb-16 pt-32">
        @if ($layout->sticker)
            <div class="relative">
                <div class="absolute right-full -translate-y-1/3 translate-x-1/4">
                    <svg class="block h-auto w-48" xmlns="http://www.w3.org/2000/svg" width="129.27" height="123.5"
                        viewBox="0 0 129.27 123.5">
                        <path fill="#ffce00"
                            d="M0 63.34v3.53C-.52 89.73 43.69 134.43 81.13 121c21.94-7.84 38.24-13.32 46.55-42.75 3.92-13.85 2.91-48.15-30.91-67.05 0 0-44.32-28.67-80.17 5.74C.84 32.06-.07 56.18 0 63.34Z" />
                    </svg>

                    <div
                        class="absolute inset-0 z-10 flex max-w-full flex-col items-center justify-center p-4 text-center text-xl font-bold leading-none">
                        {{ $layout->sticker }}</div>
                </div>
            </div>
        @endif
        {!! $layout->video_embed_code !!}
    </div>

</div>
