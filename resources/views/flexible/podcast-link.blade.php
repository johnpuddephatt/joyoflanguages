@if ($layout->podcast)
    <div class="py-12">
        <div class="relative bg-yellow py-16">
            <div class="container relative z-10 text-center">
                <x-library-image conversion="3x2" class="mx-auto mb-4 max-w-2xl" :image="$layout->podcast->image" />
                <h2 class="mx-auto mb-4 max-w-2xl text-3xl font-bold"> {{ $layout->podcast->title }}</h2>

                <x-button-link href="{{ $layout->podcast->url }}" class="mx-auto">
                    Listen now</x-button-link>
            </div>
        </div>
    </div>
@endif
