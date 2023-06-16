<div class="bg-white py-8 lg:py-16">
    <div class="container grid gap-8 lg:grid-cols-3 lg:gap-0">
        <div class="col-span-2">
            <div class="{{ $layout->reverse ? 'ml-auto' : '' }} prose">
                {!! $layout->main !!}
            </div>
        </div>
        @if ($layout->sidebar && $layout->sidebar !== '<p></p>')
            <div class="{{ $layout->reverse ? 'order-first' : 'order-first lg:order-none' }}">

                <div class="{{ $layout->reverse ? '' : 'lg:ml-auto' }} prose text-xl font-bold italic lg:max-w-sm">
                    <hr class="mb-4 w-48 max-w-full border-t-2 border-teal-light" />
                    {!! $layout->sidebar !!}
                </div>
            </div>
        @endif
    </div>
</div>
