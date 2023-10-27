<div class="relative">
    <div class="{{ $class ?? 'container w-full lg:max-w-6xl mx-auto' }}">
        <div class="flex flex-col-reverse gap-6 lg:flex-row lg:items-center lg:gap-12">
            <div class="{{ $layout->reverse ? 'order-last' : '' }} lg:w-[55%]">
                @if ($layout->title)
                    <h2 class="type-lg">{{ $layout->title }}</h2>
                @endif

                @if ($layout->text)
                    <div class="prose-standout prose">
                        @markdown($layout->text)
                    </div>
                @endif
            </div>

            <div
                class="@if (count($layout->images) > 1) aspect-square @endif {{ $layout->reverse ? 'lg:-ml-16' : 'lg:-mr-16' }} relative flex-1 lg:w-[45%]">

                @if (count($layout->images) == 1)
                    <x-library-image class="h-auto w-full" conversion="3x2" :image="$layout->images[0]" />
                @else
                    @php
                        $classes = ['-rotate-6 left-[40%] top-[25%] w-[65%] h-auto', 'rotate-12 left-[55%] top-[75%] w-[40%]', 'rotate-3 left-[80%] top-[45%] w-[40%]', '-rotate-6 left-[20%] top-[60%] w-[35%] z-10'];
                    @endphp

                    @foreach ($layout->images as $key => $image)
                        <x-library-image class="{{ $classes[$key] }} absolute -translate-x-1/2 -translate-y-1/2"
                            conversion="uncropped" :image="$image" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @if ($layout->show_shape)
        <svg class="-bottom-48 left-0 -mb-16 mt-6 hidden h-auto w-16 lg:absolute lg:block lg:w-48 2xl:w-60"
            xmlns="http://www.w3.org/2000/svg" width="119.23" height="234.55" viewBox="0 0 119.23 234.55">
            <path fill="#eca76b"
                d="M.24 234.55c29.22-1.65 70.1-13 92.65-59.12 16.56-33.9 3.7-73.56-.72-85.12-.73-1.9-1.41-3.82-2.06-5.75-7.83-23-48-49.34-90.11-56" />
            <path fill="#ffce00"
                d="M25.66 46.3v2.56c-.2 16.55 32.15 48.56 59.15 38.58 15.82-5.85 27.58-9.95 33.36-31.31 2.73-10.09 1.73-34.91-22.9-48.33 0 0-32.3-20.41-58 4.78C26.01 23.65 25.54 41.12 25.66 46.3Z" />
        </svg>
    @endif

</div>
