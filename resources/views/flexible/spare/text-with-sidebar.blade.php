<div class="relative overflow-hidden">
    <div class="lg:container lg:grid lg:grid-cols-3 lg:gap-0">
        <div class="py-8 max-lg:container lg:col-span-2 lg:py-16">
            <div class="prose:emphasise-first {{ $layout->reverse ? 'ml-auto' : '' }} prose">
                {!! $layout->main !!}
            </div>
        </div>
        <div
            class="{{ $layout->reverse ? 'order-first' : '' }} relative py-8 before:absolute before:left-0 before:top-0 before:bottom-0 before:-z-10 before:block before:w-[99999px] before:bg-gray lg:py-16 lg:px-8">
            <div class="{{ $layout->reverse ? '' : 'ml-auto' }} max-lg:container lg:max-w-xs">
                @if ($layout->sidebar_title)
                    <h3 class="mb-6 text-lg font-semibold">{{ $layout->sidebar_title }}</h3>
                @endif
                <div class="prose-compact prose">
                    {!! $layout->sidebar !!}
                </div>
            </div>
        </div>
    </div>
</div>
