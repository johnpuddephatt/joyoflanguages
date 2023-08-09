<div class="relative">
    <div class="{{ $class ?? 'container w-full max-w-6xl mx-auto' }}">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:gap-8">
            <div class="{{ $layout->reverse ? 'order-last' : '' }} lg:flex-[0 0 50%] lg:w-1/2">
                @if ($layout->title)
                    <h2 class="mb-4 text-2xl font-bold lg:text-4xl">{{ $layout->title }}</h2>
                @endif

                @if ($layout->text)
                    <div class="prose lg:prose-lg">
                        @markdown($layout->text)
                    </div>
                @endif
            </div>

            @if ($layout->image)
                <div class="{{ $layout->reverse ? 'lg:-ml-16' : 'lg:-mr-16' }} relative flex-1">
                    <x-library-image class="h-auto w-full" conversion="3x2" :image="$layout->image" />
                </div>
            @endif
        </div>
    </div>

</div>
