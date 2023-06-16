@section('image', $page->image?->getUrl('thumbnail'))

@section('title', $page->title)
@extends('layouts.default') @section('content')

    <div class="container mt-48 mb-24">
        <h1 class="text-4xl font-bold">{{ $page->title }} </h1>
        <p>{{ $page->introduction }}</p>
    </div>

    <div class="container space-y-8">
        @foreach ($page->content->podcasts as $podcast)
            <x-podcast.card :podcast="$podcast" />
        @endforeach
    </div>

@endsection
