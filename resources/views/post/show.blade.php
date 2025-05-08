@section('image', $post->image?->getUrl('thumbnail'))
@section('title', $post->title)
@section('description', $post->introduction)

@extends('layouts.default', [
    'language' => $post->language,
    'theme' => null,
]) @section('content')

    <div
        class="container mx-auto flex min-h-[65vmin] flex-col-reverse gap-8 pb-8 pt-40 lg:flex-row lg:items-center 2xl:gap-16">

        <svg class="pointer-events-none absolute left-0 right-0 top-0 hidden h-auto w-screen lg:block"
            xmlns="http://www.w3.org/2000/svg" width="2560" height="1297" viewBox="0 0 2560 1297">
            <path fill="#4caeb8"
                d="M2793.46 126.11c-.14-5.6-.12-11.18-.06-16.78 1.35-108.61-211-318.68-388.15-253.15-103.81 38.4-180.95 65.26-218.92 205.48-17.92 66.18-11.37 229.07 150.26 317.1 0 0 212 134 380.55-31.36 74.07-72.64 77.16-187.25 76.32-221.29Z" />
            <path fill="#f4b6bb" class="-translate-x-36"
                d="M329.24 465.82c-3.22-5.29-6.3-10.66-9.32-16.07-58.74-105-378.6-189.22-512.4-28.42C-270.88 515.55-330.07 584-289 739.51c19.38 73.42 115.69 226.11 319.46 221.26 0 0 277.47 11.38 347.87-240.41 30.91-110.64-29.47-222.36-49.09-254.54Z" />
            <path fill="#ffd802"
                d="M2613.23 899.06c-.16-6.53-.14-13-.06-19.58 1.56-126.77-246.26-372-453-295.47-121.16 44.82-211.21 76.17-255.52 239.83-20.96 77.24-13.31 267.36 175.35 370.16 0 0 247.43 156.33 444.17-36.61 86.43-84.82 90.04-218.6 89.06-258.33Z" />
        </svg>
        <div class="relative">
            <div class="mb-4 text-lg">
                @foreach ($post->tags as $tag)
                    <a
                        href="{{ \App\Models\Page::getTemplateUrl('App\Nova\Templates\PostsPageTemplate') }}?tags={{ $tag->slug }}">#{{ $tag->name }}</a>
                @endforeach
            </div>
            <h1 class="type-xl"> {!! nl2br($post->title) !!}</h1>
            <div>
                <p class="type-xs mt-4 lg:mt-6">{{ $post->published_at->format('jS F Y') }}
                </p>
                @if ($post->introduction)
                    <p class="type-sm text-gray mt-12 max-w-xl lg:mt-16">{{ $post->introduction }}
                    </p>
                @endif
                {{-- @if ($post->author)
                    <a href="{{ route('user.show', ['user' => $post->author->slug]) }}"
                        class="mt-6 flex flex-row items-center gap-4">
                        @if ($post->author->photo)
                            <div class="h-16 w-16 overflow-hidden rounded-full">
                                <img class="-ml-5 -mt-1.5 h-auto w-28 max-w-none"
                                    src="{{ $post->author->photo->getUrl('portrait') }}">
                            </div>
                        @endif
                        <div class="flex flex-row leading-tight">
                            <h3>Written by:&nbsp;</h3>
                            <p>{{ $post->author->name }} @if ($post->author->role)
                                    , {{ $post->author->role }}
                                @endif
                            </p>
                        </div>
                    </a>
                @endif --}}
            </div>
        </div>
        <div class="w-80 flex-none lg:ml-auto 2xl:w-96">
            <x-library-image conversion="square" :image="$post->image" class="relative block h-auto w-full rounded-2xl" />
        </div>
    </div>

    <article class="container mx-auto pb-16">
        <div class="prose prose-lg">
            @svg('squiggle', 'mb-12 h-auto w-64')

            @if ($post->content)

                @foreach ($post->content as $block)
                    @includeIf('blocks.' . $block['type'], [
                        ...$block,
                        'class' => match ($block['attrs']['blockWidth'] ?? 'normal') {
                            'normal' => 'max-w-2xl',
                            'wide' => 'max-w-4xl mx-auto clear-both',
                            'full' => 'left-1/2 relative -translate-x-1/2 w-screen max-w-none w-full clear-both',
                            'sidebar' => 'px-4 lg:float-right lg:w-[calc(100%-42rem-4rem)]',
                        },
                    ])
                @endforeach
            @else
                <div class="max-w-2xl">
                    {!! $post->wordpress_content !!}
                </div>
            @endif
        </div>
    </article>

    <x-disqus :id="$post->wp_id ? $post->wp_id . ' http:\/\/joyoflanguages.com\/?p=' . $post->wp_id : 'jol_' . $post->id" />

    <div class="bg-pink clear-both py-16">
        <div class="container-lg mx-auto">
            <div class="mb-12 flex flex-col justify-between lg:flex-row">
                <h2 class="text-3xl font-bold">More of our latest news</h2>

            </div>
            <div class="mt-8 grid gap-6 lg:mt-16 lg:grid-cols-3 lg:gap-16">
                @foreach ($related_posts as $related_post)
                    <x-post.card :post="$related_post" />
                @endforeach
            </div>
        </div>
    </div>

    @include('flexible.newsletter')

@endsection
