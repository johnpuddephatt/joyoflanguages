@props(['post', 'hide_tags' => false, 'hide_date' => false])
<a href="{{ $post->url }}"
    {{ $attributes->class(['relative w-full flex items-center flex-col md:flex-row gap-2 md:gap-6']) }}>
    @if ($post->image)
        <x-library-image conversion="3x2" :image="$post->image" class="relative block h-auto w-full flex-none md:w-40" />
    @else
        <div class="aspect-video w-40 bg-teal bg-opacity-10"></div>
    @endif
    <div class="flex flex-col items-start">
        @if (!$hide_date)
            <div class="mb-1 font-semibold">{{ $post->created_at->format('M Y') }}</div>
        @endif
        <h3 class="type-xs max-w-lg">{{ $post->title }}</h3>

        @if (!$hide_tags)
            <div class="font-semibold">
                @foreach ($post->tags as $tag)
                    #{{ $tag->name }}
                @endforeach
            </div>
        @endif
    </div>
</a>
