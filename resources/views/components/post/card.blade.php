@props(['post'])
<div {{ $attributes->class(['relative flex items-start flex-col mb-12']) }}>
    <x-library-image conversion="3x2" :image="$post->image" class="relative block h-auto w-full" />
    <div class="mb-1 mt-6">{{ $post->created_at->format('M Y') }}</div>
    <h3 class="mb-8 text-2xl font-bold leading-tight lg:mb-12">{{ $post->title }}</h3>
    <x-button-link class="mt-auto shadow-yellow before:absolute before:inset-0" :href="$post->url">Read
        more</x-button-link>
</div>
