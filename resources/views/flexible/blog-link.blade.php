@if ($layout->post)
    <div class="{{ $class ?? 'mx-auto max-w-5xl' }} py-12">
        <div class="relative ml-16 flex flex-row items-center bg-beige py-6">
            <x-library-image conversion="3x2" class="mx-auto -ml-16 w-full max-w-xs" :image="$layout->post->image" />

            <div class="container relative pl-16">
                <h2 class="mx-auto mb-8 max-w-2xl text-3xl font-bold"> {{ $layout->post->title }}</h2>

                <x-button-link href="{{ $layout->post->url }}" class="mx-auto shadow-yellow">
                    Read more</x-button-link>
            </div>
        </div>
    </div>
@endif
