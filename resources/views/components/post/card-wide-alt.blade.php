@props(['post', 'hide_tags' => false, 'hide_date' => false])
<a href="{{ $post->url }}"
    {{ $attributes->class(['relative w-full flex py-6 items-center flex-row gap-3 lg:gap-6']) }}>
    @if ($post->image)
        <x-library-image conversion="square" :image="$post->image"
            class="relative block h-auto w-24 flex-none rounded-xl lg:w-40 lg:rounded-3xl" />
    @else
        <div class="aspect-video w-40 rounded-3xl bg-teal bg-opacity-10"></div>
    @endif
    <div class="flex flex-col items-start">
        @if (!$hide_date)
            <div class="type-xs">{{ $post->created_at->format('M Y') }}</div>
        @endif
        <h3 class="type-sm max-w-lg">{{ $post->title }}</h3>

        @if (!$hide_tags && $post->tags)
            <div class="font-semibold">
                @foreach ($post->tags as $tag)
                    #{{ $tag->name }}
                @endforeach
            </div>
        @endif
    </div>
</a>
