    <div class="@if ($layout->badge) pt-28 @endif relative py-12 lg:py-24">

        <div class="left-0 top-32 -z-10 min-h-[65%] w-full py-8">
            <div
                class="{{ $layout->reverse ? '' : 'justify-between' }} container relative flex flex-col gap-12 lg:flex-row lg:items-center lg:gap-24">
                <div class="{{ $layout->reverse ? 'order-last' : '' }} prose max-w-lg">
                    @if ($layout->title)
                        <h2 class="mt-0 mb-0 text-4xl font-bold lg:text-6xl">{{ $layout->title }}</h2>
                    @endif

                    <div class="mt-4">
                        {!! $layout->main !!}</div>

                </div>

                <x-responsive-image :image="$layout->image" conversion="square"
                    class="{{ $layout->reverse ? 'order-first' : '' }} block w-full max-w-none object-cover lg:w-1/2" />

            </div>
        </div>

    </div>
