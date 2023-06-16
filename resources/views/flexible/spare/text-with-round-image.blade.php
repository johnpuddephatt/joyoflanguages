<div class="bg-white">
    <div class="container flex-row items-center gap-4 py-8 lg:flex lg:gap-8 lg:py-12">
        <x-image :image="$layout->image" conversion="square"
            class="{{ $layout->large ? 'h-48 w-48 lg:h-96 lg:w-96' : 'h-36 w-36 lg:w-64 lg:h-64' }} rounded-full object-cover lg:mx-auto" />
        <div class="@if ($layout->reverse) lg:-order-1 @endif col-span-2 max-w-2xl pt-8 lg:pt-0">
            @if ($layout->title)
                <h2 class="mt-0 mb-4 text-3xl font-bold">{{ $layout->title }}</h2>
            @endif
            @if ($layout->subtitle)
                <h3 class="-mt-2 mb-4 !text-xl font-bold">{{ $layout->subtitle }}</h3>
            @endif
            <div class="prose">
                {!! $layout->main !!}</div>
        </div>

    </div>
</div>
