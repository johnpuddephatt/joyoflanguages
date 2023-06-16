@props(['post'])
<a href="{{ $post->url }}" {{ $attributes->class(['relative flex items-center flex-row gap-16 py-8']) }}>
    <x-library-image conversion="square" :image="$post->image" class="relative block h-auto w-64 rounded-xl" />
    <div class="flex max-w-lg flex-grow flex-col items-start">
        <div class="mt-8 mb-2 text-xl">{{ $post->created_at->format('M Y') }}</div>
        <h3 class="mb-2 text-2xl font-bold">{{ $post->title }}</h3>
        <p class="mb-8 text-sm">{{ $post->introduction }}</p>
        <div>#asdfasdf</div>
    </div>
</a>
