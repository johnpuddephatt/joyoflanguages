<a href="{{ $production->url }}" class="relative block md:grid md:grid-cols-2">
    <x-image conversion="3x2" class="w-full lg:mt-16" :image="$production->image" />
    <div
        class="@if ($flip) bg-black left-1/2 @else bg-teal right-1/2 @endif absolute top-0 hidden h-16 w-16 md:block">
    </div>
    <div
        class="@if ($flip) -order-1 bg-black @else bg-teal @endif relative z-10 flex flex-col justify-center px-6 py-12 text-white max-md:ml-8 max-md:-mt-8 lg:px-12 lg:py-16">
        <h1 class="mb-6 text-3xl font-bold lg:text-5xl">{!! $production->title !!}</h1>
        <div class="mb-8 max-w-md font-semibold">{!! $production->introduction !!}</div>
        <p class="w-36 border-b-2 border-lilac pb-2 text-left text-sm font-semibold">Read more</p>
    </div>
</a>
