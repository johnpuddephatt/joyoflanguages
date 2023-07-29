<div class="container mx-auto my-16 flex flex-row gap-4">
    @foreach ($layout->features as $feature)
        <div class="flex-1 bg-beige p-4">
            @if ($feature->image)
                <x-responsive-image :image="$feature->image" conversion="3x2" class="mx-auto block w-full" />
            @endif
            @if ($feature->title)
                <h3 class="font-bold">{{ $feature->title }}</h3>
            @endif
            @if ($feature->description)
                <p>{{ $feature->description }}</p>
            @endif

        </div>
    @endforeach
</div>
