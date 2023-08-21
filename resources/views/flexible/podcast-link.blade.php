@if ($layout->podcast)
    <div class="{{ $class ?? 'mx-auto max-w-5xl' }} py-12">
        <div class="relative ml-16 flex flex-row items-center bg-yellow py-6">
            <x-library-image conversion="3x2" class="mx-auto mb-4 max-w-2xl" :image="$layout->podcast->image" />

            <div class="container relative pl-16">
                <h3 class="mb-8 max-w-2xl text-2xl font-bold leading-tight"> {{ $layout->podcast->title }}</h3>

                <x-button-link href="{{ $layout->podcast->url }}" class="mx-auto shadow-white">
                    Listen now</x-button-link>
            </div>
        </div>
    </div>
@endif
