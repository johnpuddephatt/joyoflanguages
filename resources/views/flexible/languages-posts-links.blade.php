<div class="container mx-auto my-16">
    <div class="mb-12 flex flex-row items-end justify-center">
        <div class="relative mb-24">
            <h2 class="ml-auto block text-4xl font-bold"">{{ $layout->title }}

                <svg xmlns="http://www.w3.org/2000/svg" width="749.33" height="4.21"
                    class="absolute mt-6 w-full -translate-x-1/3" viewBox="0 0 749.33 4.21">
                    <path fill="none" stroke="#12171e" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="4.21" d="M2.11 2.11h745.11" />
                </svg>
            </h2>

        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-12 h-auto w-72" width="613.79" height="627.19"
            viewBox="0 0 613.79 627.19">
            <defs>
                <style>
                    .prefix__cls-2 {
                        fill: none;
                        stroke: #12171e;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        stroke-width: 4.21px
                    }
                </style>
            </defs>
            <path fill="#ffd900"
                d="M7.57 208.66c1.08-5.11 2-10.25 2.91-15.39 17.33-100 248.2-256.61 399.7-166.16 88.77 53 155 90.85 165.94 226.1 5.14 63.83-28.7 212.3-192.18 265.52 0 0-217.56 86.78-344.1-93.82C-15.76 345.56.99 239.78 7.57 208.66Z" />
            <path
                d="M219.06 398.07s-4.13 11.92-23.93 56.8c-34.4 78-40 168 33.38 170.16s108.91-81.05 116.62-107.45 9.16-91.32 11.36-100.48 22.19-45.48 18-48-11 19.8-18 19.8 8.81-40.89 2.2-41.26-13.75 35.94-17 36.67-.55-38.32-4.58-38.5-6.24 36.49-9.72 36.67.18-37-6.23-36.67-6.54 31.23-6.54 43-22.5-13.69-25.43-7.83 20.54 33.25 20.54 33.25-10.78 57.95-13.6 69.08c-8 31.43-23.93 57.08-43.74 48.28-16.77-7.46 5.5-56.85 5.5-56.85m274.27 7.14s9.78 55.26-6.36 56.48-46.21-121.26-48.9-133.24 18.34-34.48 14.92-37.65-16.63 13.93-21 13.93-2.2-44.49-8.56-43.76.25 35.94-5.37 35.94-8.32-35.94-13-35.94 2.44 36.18-2.2 37.16-15.16-33.74-19.32-29 12.47 30.51 8.35 35.89-9.57-13.21-16.66-17.36 1.22 17.11 12.47 29.34S450 498.79 450 498.79s28.85 125.51 85.08 126.32 100.66-51.44 62.1-169.34c-17.11-52.32-26.57-79.14-26.57-79.14"
                class="prefix__cls-2" />
            <path d="M309.68 414.16c-21.52-12.71-92.91-45-92.91-45l-24.2-252.5s178.7 56.93 199.23 73.56"
                class="prefix__cls-2" />
            <path
                d="M480.9 414.16c21.51-12.71 92.9-45 92.9-45l24.18-252.52s-185.62 56.93-206.16 73.56c0 0-118.33-78.24-148.16-85.09v28.23m195.33 299.3c-21.32 8.92-37.62 16.5-42.89 20.76-5.29-4.28-20.91-11.9-41.2-20.86"
                class="prefix__cls-2" />
        </svg>
    </div>

    <div class="mb-12 flex flex-col justify-center gap-8 lg:flex-row lg:gap-12">
        @foreach ($layout->languages as $language)
            <div class="flex flex-col rounded-3xl bg-beige p-8 text-center lg:w-1/3">

                <img class="mx-auto mb-4 h-32 w-32 2xl:h-36 2xl:w-36"
                    src="{{ Storage::disk('public')->url($language->image) }}" />
                <h3 class="mb-auto pb-16 text-3xl font-bold">{{ $language->name }}</h3>

                <x-button-link href="{{ $language->blog_link }}" class="mx-auto max-w-sm shadow-white">Read
                    articles</x-button-link>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        <x-button-link class="shadow-pink" href="{{ $layout->button_url ?? $layout->posts_link }}">See all
            articles</x-button-link>
    </div>
</div>
