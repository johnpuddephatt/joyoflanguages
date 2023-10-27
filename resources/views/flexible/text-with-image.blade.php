<div class="{{ $layout->background_colour ?? '' }} relative overflow-hidden py-16 lg:pt-24">
    <div class="{{ $class ?? 'container w-full  mx-auto' }}">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-center">
            <div class="{{ $layout->reverse ? 'order-last' : '' }} lg:flex-[0 0 50%] lg:w-[60%]">
                @if ($layout->title)
                    <h2 class="type-xl mb-8">{{ $layout->title }}</h2>
                @endif

                @if ($layout->text)
                    <div class="prose-standout prose">
                        @markdown($layout->text)
                    </div>
                @endif
            </div>

            @if ($layout->image)
                <div class="{{ $layout->reverse ? 'lg:-ml-20' : 'lg:-mr-20' }} relative flex-1">
                    <x-library-image class="h-auto w-full" conversion="3x2" :image="$layout->image" />

                    @if ($layout->squiggle == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" width="105.85" height="200.16"
                            class="absolute -left-6 -top-4 h-auto w-1/4" viewBox="0 0 105.85 200.16">
                            <path fill="none" stroke="#ffce00" stroke-linecap="round" stroke-miterlimit="10"
                                stroke-width="3.84"
                                d="M103.94 30.2C82.57 2.55 51.18-11.43 34.74 19.4 24.46 38.66 62.35 97.13 65.69 131.91c0 0 17.83 51-47.64 2.18-15.84-11.55 5.13-24 16.69-15s-7.14 74-32.82 79.13" />
                        </svg>
                    @elseif($layout->squiggle == 2)
                        <svg xmlns="http://www.w3.org/2000/svg" width="307.32" height="119.97"
                            class="absolute -bottom-16 -right-16 h-auto w-4/5" viewBox="0 0 307.32 119.97">
                            <path fill="none" stroke="#ffce00" stroke-linecap="round" stroke-miterlimit="10"
                                stroke-width="3.84"
                                d="M305.41 47.18c-6.87-16.81-14.11-30.1-32-27.06-12.45 2.11-20.67 13.64-28.15 23.81s-17.64 20.85-30.23 19.92c-16.61-1.22-24.23-20.48-34.41-33.65-21.37-27.65-52.76-41.63-69.2-10.8-10.27 19.26-5 30.16-1.65 64.95 0 0 8.56 64.19-56.91 15.41C37.02 88.2 43.44 63.38 55 72.37s-40.57 37.52-53.07-5.14" />
                        </svg>
                    @endif
                </div>
            @endif
        </div>
    </div>

</div>
