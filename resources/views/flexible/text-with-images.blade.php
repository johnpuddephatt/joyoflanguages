    <div class="relative py-4 lg:py-8">

        <div class="{{ $class ?? 'max-w-2xl mx-auto' }}">
            <div
                class="{{ $layout->reverse ? 'pr-[25%]' : 'pl-[25%] justify-between' }} container relative flex flex-col gap-4 lg:flex-row lg:items-center lg:gap-8">
                <div class="{{ $layout->reverse ? 'order-last' : '' }} prose max-w-lg">
                    @if ($layout->title)
                        <h2 class="mt-0 mb-0 text-xl font-bold lg:text-2xl">{{ $layout->title }}</h2>
                    @endif

                    @if ($layout->text)
                        <div class="mt-4">
                            @markdown($layout->text)
                        </div>
                    @endif
                </div>

                @foreach ($layout->images as $image)
                    <x-library-image conversion="uncropped" :image="$image" />
                @endforeach
            </div>

        </div>
    </div>
