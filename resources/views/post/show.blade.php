@section('image', $post->image?->getUrl('thumbnail'))
@section('title', $post->title)
@extends('layouts.default') @section('content')

    <x-post.hero :post="$post" />

    <article>
        @foreach ($post->content as $layout)
            @include('flexible.' . $layout->name(), ['layout' => $layout])
        @endforeach
    </article>

    <div class="container mt-12 lg:mt-16">
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
