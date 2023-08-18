    <div class="relative pt-12 lg:pt-16">
        <div class="{{ $class ?? 'max-w-7xl px-4' }} container lg:pr-0">
            <div
                class="{{ $layout->reverse ? 'lg:pl-[calc(25%-1rem)]' : 'lg:pr-[calc(25%-1rem)]' }} relative flex flex-col gap-4 lg:flex-row lg:items-center lg:gap-8">
                <img src="{{ Storage::disk('public')->url($layout->image) }}"
                    class="{{ $layout->reverse ? 'lg:order-last' : '' }} flex-0 block w-1/4 max-w-none object-cover" />
                <div class="{{ $layout->reverse ? 'lg:order-first' : '' }} w-full">
                    @if ($layout->title)
                        <h2 class="mb-0 mt-0 text-xl font-bold lg:text-2xl">{{ $layout->title }}</h2>
                    @endif
                    <div class="mt-4">
                        @markdown($layout->main)
                    </div>
                </div>

            </div>
        </div>
    </div>
