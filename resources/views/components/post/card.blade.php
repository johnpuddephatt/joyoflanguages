@props(['post'])
<div {{ $attributes->class(['relative flex items-start flex-col lg:mb-12']) }}>
    <x-library-image conversion="3x2" :image="$post->image" class="relative block h-auto w-full" />
    <div class="type-xs mt-6">{{ $post->created_at->format('M Y') }}</div>
    <h3 class="type-sm mb-8 lg:mb-12">{{ $post->title }}</h3>
    <x-button-link class="mt-auto shadow-yellow before:absolute before:inset-0" :href="$post->url">Read
        more</x-button-link>
</div>
