    <div class="relative py-4 lg:py-8">

        <div class="{{ $class ?? 'max-w-2xl mx-auto' }}">
            <div
                class="{{ $layout->reverse ? 'pr-[25%]' : 'pl-[25%] justify-between' }} container relative flex flex-col gap-4 lg:flex-row lg:items-center lg:gap-8">
                <div class="{{ $layout->reverse ? 'order-last' : '' }} prose max-w-lg">
                    @if ($layout->title)
                        <h2 class="mt-0 mb-0 text-xl font-bold lg:text-2xl">{{ $layout->title }}</h2>
                    @endif

                    <div class="mt-4">
                        @markdown($layout->description)
                    </div>
                </div>

                <img src="{{ $layout->image }}"
                    class="{{ $layout->reverse ? 'order-first' : '' }} block w-full max-w-none object-cover lg:w-1/4" />

            </div>
        </div>

    </div>
