@if ($layout->post)
    <div class="{{ $class ?? 'mx-auto max-w-5xl' }} container py-12">
        <div class="relative flex flex-col bg-beige lg:ml-16 lg:flex-row lg:items-center lg:py-6">
            <x-library-image conversion="3x2" class="mx-auto w-full lg:-ml-16 lg:max-w-xs" :image="$layout->post->image" />

            <div class="relative px-4 py-8 lg:px-8">
                <h2 class="mx-auto mb-6 max-w-2xl text-2xl font-bold leading-tight lg:mb-8"> {{ $layout->post->title }}
                </h2>

                <x-button-link href="{{ $layout->post->url }}" class="mx-auto shadow-yellow">
                    Read more</x-button-link>
            </div>
        </div>
    </div>
@endif
