@section('image', $page->image?->getUrl('thumbnail'))

@section('title', $page->title)
@extends('layouts.default') @section('content')

    <div class="container mt-48 mb-24">
        <h1 class="text-4xl font-bold">Posts</h1>
    </div>

    <div class="container mb-24 max-w-6xl divide-y divide-light-teal">
        @foreach ($page->content->posts as $post)
            <x-post.card-wide :post="$post" />
        @endforeach
    </div>

@endsection
