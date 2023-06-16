<div class="relative flex flex-col justify-end pt-48 pb-12">
    <div class="pointer-events-none absolute top-0 left-0 right-0 z-10 h-64">
    </div>
    <div id="hero-text" class="container">
        <h1 class="max-w-5xl text-5xl font-bold !tracking-normal lg:text-7xl 2xl:text-8xl">
            {!! nl2br($post->title) !!}</h1>
        <div>
            <p class="mt-4 text-xl font-bold lg:mt-6 lg:text-3xl">{{ $post->published_at->format('jS F Y') }}
            </p>
            @if ($post->author)
                <a href="{{ route('user.show', ['user' => $post->author->slug]) }}"
                    class="mt-6 flex flex-row items-center gap-4">
                    @if ($post->author->photo)
                        <div class="h-16 w-16 overflow-hidden rounded-full">
                            <img class="-ml-5 -mt-1.5 h-auto w-28 max-w-none"
                                src="{{ $post->author->photo->getUrl('portrait') }}">
                        </div>
                    @endif
                    <div class="text-sm leading-tight">
                        <h3>Written by:</h3>
                        <p>{{ $post->author->name }}, {{ $post->author->role }}</p>
                    </div>
                </a>
            @endif
        </div>
    </div>
</div>

<div class="ml-auto w-96">
    <x-library-image conversion="square" :image="$post->image" class="relative block h-auto w-full rounded-2xl" />
</div>
