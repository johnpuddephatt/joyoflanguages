@props(['post'])
<div {{ $attributes->class(['relative block mb-12 last:mb-0 md:mb-0']) }}>
    <x-library-image conversion="3x2" :image="$post->image" class="relative block h-auto w-full" />
    <div class="flex max-w-xs flex-grow flex-col items-start">
        <div class="mt-8">{{ $post->created_at->format('M Y') }}</div>
        <h3 class="mb-4 text-2xl font-bold">{{ $post->title }}</h3>
        <p class="mb-8 h-12 text-sm">{{ $post->introduction }}</p>
        <x-button-link class="mt-8 shadow-yellow before:absolute before:inset-0" :href="$post->url">Read
            more</x-button-link>
    </div>
</div>
