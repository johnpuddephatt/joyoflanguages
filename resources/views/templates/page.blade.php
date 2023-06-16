@section('image', $page->image?->getUrl('thumbnail'))
@section('title', $page->title)
@extends('layouts.default') @section('content')
    @foreach ($page->content as $layout)
        @include('flexible.' . $layout->name(), ['layout' => $layout])
    @endforeach

    @if ($page->parent || $page->children)
        @include('components.page-navigation')
    @endif
@endsection
