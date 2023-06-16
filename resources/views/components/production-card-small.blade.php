@props(['production'])
<a href="{{ $production->url }}" {{ $attributes->class(['block']) }}>
    <x-image conversion="3x2" :image="$production->image" class="relative block h-auto w-full" />
    <div class="flex max-w-xs flex-grow flex-col">
        <h3 class="mt-8 mb-4 text-2xl font-bold">{{ $production->title }}</h3>
        <p class="mb-8 h-12 text-sm">{{ $production->introduction }}</p>
        <p class="mt-auto w-36 border-b-2 border-teal-light pt-8 pb-2 text-left font-semibold">Read
            more
        </p>
    </div>
</a>
