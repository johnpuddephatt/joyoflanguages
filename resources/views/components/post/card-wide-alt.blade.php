@props(['post', 'hide_tags' => false, 'hide_date' => false])
<a href="{{ $post->url }}" {{ $attributes->class(['relative w-full flex py-6 items-center flex-row gap-6']) }}>
    @if ($post->image)
        <x-library-image conversion="square" :image="$post->image" class="relative block h-auto w-40 flex-none rounded-3xl" />
    @else
        <div class="aspect-video w-40 rounded-3xl bg-teal bg-opacity-10"></div>
    @endif
    <div class="flex flex-col items-start">
        @if (!$hide_date)
            <div class="mb-1 font-semibold">{{ $post->created_at->format('M Y') }}</div>
        @endif
        <h3 class="mb-2 text-xl font-semibold">{{ $post->title }}</h3>
        @if ($post->introduction)
            <p class="mb-8 text-sm">{{ $post->introduction }}</p>
        @endif
        @if (!$hide_tags && $post->tags)
            <div class="font-semibold">
                @foreach ($post->tags as $tag)
                    #{{ $tag->name }}
                @endforeach
            </div>
        @endif
    </div>
</a>