@section('image', $page->image?->getUrl('thumbnail'))

@section('title', $page->title)
@section('description', $page->introduction)

@extends('layouts.default', ['language' => $page->language, 'theme' => $page->theme]) @section('content')

    <div class="relative pt-24 lg:pt-36 2xl:pt-48">

        <svg class="pointer-events-none absolute left-0 right-0 top-0 hidden h-auto w-screen lg:block"
            xmlns="http://www.w3.org/2000/svg" width="2560" height="1297" viewBox="0 0 2560 1297">
            <path fill="#4caeb8"
                d="M2793.46 126.11c-.14-5.6-.12-11.18-.06-16.78 1.35-108.61-211-318.68-388.15-253.15-103.81 38.4-180.95 65.26-218.92 205.48-17.92 66.18-11.37 229.07 150.26 317.1 0 0 212 134 380.55-31.36 74.07-72.64 77.16-187.25 76.32-221.29Z" />
            <path fill="#f4b6bb"
                d="M329.24 465.82c-3.22-5.29-6.3-10.66-9.32-16.07-58.74-105-378.6-189.22-512.4-28.42C-270.88 515.55-330.07 584-289 739.51c19.38 73.42 115.69 226.11 319.46 221.26 0 0 277.47 11.38 347.87-240.41 30.91-110.64-29.47-222.36-49.09-254.54Z" />
            <path fill="#ffd802"
                d="M2613.23 899.06c-.16-6.53-.14-13-.06-19.58 1.56-126.77-246.26-372-453-295.47-121.16 44.82-211.21 76.17-255.52 239.83-20.96 77.24-13.31 267.36 175.35 370.16 0 0 247.43 156.33 444.17-36.61 86.43-84.82 90.04-218.6 89.06-258.33Z" />
        </svg>

        <div
            class="container relative mx-auto flex flex-col-reverse items-center justify-between gap-8 bg-blue py-12 lg:flex-row">
            <div class="max-w-lg flex-1">
                <h1 class="type-xl">{!! Str::of($page->title)->inlineMarkdown() !!} </h1>
                <p class="type-xs mt-6 max-w-md text-white">{{ $page->introduction }}</p>
            </div>
            <x-library-image :image="$page->image" class="relative mx-auto block h-auto w-72 2xl:w-80" />

        </div>

    </div>

    <livewire:posts :language="$language" />
    @include('flexible.newsletter')

@endsection
