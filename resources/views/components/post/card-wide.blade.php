@props(['post'])
<a href="{{ $post->url }}" {{ $attributes->class(['relative w-full flex items-center flex-row gap-16 py-8']) }}>
    @if ($post->image)
        <x-library-image conversion="square" :image="$post->image" class="relative block h-auto w-48 rounded-xl" />
    @else
        <div class="aspect-square w-48 rounded-xl bg-teal bg-opacity-10"></div>
    @endif
    <div class="flex max-w-lg flex-grow flex-col items-start">
        <div class="mb-2 text-xl font-semibold">{{ $post->created_at->format('M Y') }}</div>
        <h3 class="mb-2 text-2xl font-semibold">{{ $post->title }}</h3>
        <p class="mb-8 text-sm">{{ $post->introduction }}</p>
        <div class="font-semibold">
            @foreach ($post->tags as $tag)
                #{{ $tag->name }}
            @endforeach
        </div>
    </div>
</a>
