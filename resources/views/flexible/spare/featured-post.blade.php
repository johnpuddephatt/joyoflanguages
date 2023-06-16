@if ($layout->post)
    <a href="{{ $layout->post->url }}" class="relative block bg-white pt-8 lg:grid lg:grid-cols-2 lg:pt-16">
        @if ($layout->post->image)
            <x-image conversion="3x2" class="block w-full lg:mt-16" :image="$layout->post->image" />
            <div class="absolute top-16 right-1/2 hidden h-16 w-16 bg-teal lg:block"></div>
        @endif
        <div
            class="relative z-10 flex flex-col justify-center bg-teal p-6 py-12 text-white max-md:ml-8 max-md:-mt-8 lg:p-12 lg:py-24">

            <h1 class="mb-6 text-3xl font-bold lg:text-5xl">{!! $layout->post->title !!}</h1>
            <div class="mb-8 max-w-md font-semibold">{!! $layout->post->introduction !!}</div>
            <p class="w-36 border-b-2 border-lilac pb-2 text-left text-sm font-semibold">Read more</p>
        </div>
    </a>
@endif
