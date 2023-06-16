<div class="relative flex flex-col justify-end pt-48 pb-12">
    <div class="pointer-events-none absolute top-0 left-0 right-0 z-10 h-64">
    </div>
    <div id="hero-text" class="container">
        <h1 class="max-w-5xl text-5xl font-bold !tracking-normal lg:text-7xl 2xl:text-8xl">
            {!! nl2br($podcast->title) !!}</h1>
        <div>
            <p class="mt-4 text-xl font-bold lg:mt-6 lg:text-3xl">{{ $podcast->published_at->format('jS F Y') }}
            </p>
            @if ($podcast->author)
                <a href="{{ route('user.show', ['user' => $podcast->author->slug]) }}"
                    class="mt-6 flex flex-row items-center gap-4">
                    @if ($podcast->author->photo)
                        <div class="h-16 w-16 overflow-hidden rounded-full">
                            <img class="-ml-5 -mt-1.5 h-auto w-28 max-w-none"
                                src="{{ $podcast->author->photo->getUrl('portrait') }}">
                        </div>
                    @endif
                    <div class="text-sm leading-tight">
                        <h3>Written by:</h3>
                        <p>{{ $podcast->author->name }}, {{ $podcast->author->role }}</p>
                    </div>
                </a>
            @endif
        </div>
    </div>
</div>

<div
    class="@if ($podcast->author) lg:-mt-48 @else lg:-mt-24 @endif relative z-10 ml-auto lg:w-1/2 2xl:w-1/2">
    <x-library-image conversion="3x2" :image="$podcast->image" class="relative block h-auto w-full" />
</div>
