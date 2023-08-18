@section('image', $page->image?->getUrl('thumbnail'))
@section('title', $page->title)
@extends('layouts.default', ['language' => $page->language, 'theme' => $page->theme]) @section('content')
    @foreach ($page->content as $layout)
        @include('flexible.' . $layout->name(), [
            'layout' => $layout,
        ])
    @endforeach
@endsection
