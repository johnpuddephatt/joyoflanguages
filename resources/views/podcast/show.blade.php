@section('image', $podcast->image?->getUrl('thumbnail'))
@section('title', $podcast->title)
@extends('layouts.default') @section('content')

    <x-podcast-hero :podcast="$podcast" />

@endsection
