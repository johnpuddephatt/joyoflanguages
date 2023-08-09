<div class="relative">
    <div class="container mx-auto flex max-w-6xl flex-col-reverse py-8 lg:flex-row lg:pb-24 lg:pt-48">
        <div class="lg:w-1/2 lg:pb-16 lg:pr-16">

            <div class="mb-4 text-2xl font-bold text-light-teal">{{ $layout->pretitle }}</div>
            <h1 class="mb-4 text-3xl font-bold lg:mb-8 lg:text-5xl">{!! nl2br($layout->title) !!}</h1>
            <div class="prose lg:prose-lg">@markdown($layout->description)</div>
        </div>
        <div class="lg:w-1/2">

            <x-responsive-image conversion="landscape" :image="$layout->image" class="h-auto w-full" />

            <svg xmlns="http://www.w3.org/2000/svg" width="422.37" height="289.97" viewBox="0 0 422.37 289.97"
                class="bottom-0 right-0 -z-10 hidden h-full w-[calc(50%+6rem)] lg:absolute">
                <path fill="none" stroke="#ffce00" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3.84"
                    d="M420.45 288.05c-120.26-53.49-36.81-65.05-51.78-89.44-18.42-30 48.65-56 16.69-74-9.42-5.3-68 14.61-53.85-38 12.16-45.33-18.33-20.33-26.11-39.37-6.87-16.82-14.11-30.11-32-27.07-12.45 2.12-20.67 13.65-28.14 23.82s-17.65 20.84-30.24 19.91c-16.6-1.22-24.22-20.47-34.4-33.64-21.38-27.71-52.81-41.69-69.22-10.86-10.27 19.26-5 30.16-1.64 65 0 0 8.56 64.19-56.92 15.4-15.83-11.55-9.42-36.37 2.14-27.39s-40.57 37.52-53.07-5.13" />
            </svg>

        </div>
    </div>
</div>
