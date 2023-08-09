<div class="container mx-auto max-w-6xl py-16">

    @include('components.block-intro', ['layout' => $layout])

    <div class="my-16 flex flex-col gap-4 lg:flex-row">
        @foreach ($layout->features as $feature)
            <div class="flex-1 bg-beige">
                @if ($feature->image)
                    <x-library-image :image="$feature->image" conversion="3x2" class="mx-auto block w-full" />
                @endif
                <div class="px-4 py-6">
                    @if ($feature->title)
                        <h3 class="mb-2 mr-8 text-2xl font-bold leading-tight">{{ $feature->title }}</h3>
                    @endif
                    @if ($feature->description)
                        <p class="text-sm">{{ $feature->description }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="prose mx-auto max-w-lg rounded-3xl bg-light-teal bg-opacity-20 p-8 lg:px-16">@markdown($layout->outro)</div>

</div>
