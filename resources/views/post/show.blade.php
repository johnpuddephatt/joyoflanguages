@section('image', $post->image?->getUrl('thumbnail'))
@section('title', $post->title)
@extends('layouts.default', [
    'language' => $post->language,
]) @section('content')

    <div class="container mx-auto flex min-h-[80vmin] max-w-6xl flex-col items-center lg:flex-row">
        <div class="">
            <div class="mb-4 text-lg">
                @foreach ($post->tags as $tag)
                    <a
                        href="{{ \App\Models\Page::getTemplateUrl('App\Nova\Templates\PostsPageTemplate') }}?tags={{ $tag->slug }}">#{{ $tag->name }}</a>
                @endforeach
            </div>
            <h1 class="max-w-5xl text-4xl font-bold !tracking-normal lg:text-5xl 2xl:text-6xl">
                {!! nl2br($post->title) !!}</h1>
            <div>
                <p class="mt-4 text-lg text-gray lg:mt-6">{{ $post->published_at->format('jS F Y') }}
                </p>
                <p class="mt-12 max-w-xl text-xl font-semibold text-gray lg:mt-16">{{ $post->introduction }}
                </p>
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
        <div class="ml-auto w-96">
            <x-library-image conversion="square" :image="$post->image" class="relative block h-auto w-full rounded-2xl" />
        </div>
    </div>

    <article class="prose prose-gray mx-auto max-w-6xl px-4">

        @svg('squiggle', 'mb-8 h-auto w-64')

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
    </article>

    <x-disqus :id="$post->wp_id ? $post->wp_id . ' http:\/\/joyoflanguages.com\/?p=' . $post->wp_id : 'jol_' . $post->id" />

    <div class="container clear-both mt-12 lg:mt-16">
        <div class="mb-12 flex flex-col items-end justify-between lg:flex-row">
            <h2 class="text-3xl font-bold lg:text-4xl">More of our latest news</h2>
            <a class="text-2xl font-bold text-teal"
                href="{{ \App\Models\Page::getTemplateUrl('App\Nova\Templates\PostsPageTemplate') }}">see all
                news</a>
        </div>
        <div class="my-8 grid gap-8 bg-white lg:my-16 lg:grid-cols-3 lg:gap-16">
            @foreach ($related_posts as $related_post)
                <x-post.card :post="$related_post" />
            @endforeach
        </div>
    </div>
@endsection
