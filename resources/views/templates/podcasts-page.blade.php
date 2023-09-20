@section('image', $page->image?->getUrl('thumbnail'))

@section('title', $page->title)
@section('description', $page->introduction)

@extends('layouts.default', ['language' => $page->language, 'theme' => $page->theme]) @section('content')

    <div class="relative">

        <svg class="pointer-events-none absolute left-0 right-0 top-0 hidden h-auto w-screen lg:block"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0"
            y="0" enable-background="new 0 0 2563.4 1676.3" version="1.1" viewBox="0 0 2563.4 1676.3">
            <defs>
                <path id="a" d="M0 0H2563.4V1676.3H0z" />
            </defs>
            <clipPath id="b">
                <use xlink:href="#a" overflow="visible" />
            </clipPath>
            <path fill="#00b4c0"
                d="M2796.9 128.5c-.1-5.6-.1-11.2-.1-16.8 1.3-108.6-211-318.7-388.2-253.2-103.8 38.4-181 65.3-218.9 205.5-17.9 66.2-11.4 229.1 150.3 317.1 0 0 212 133.9 380.6-31.4 74-72.5 77.1-187.2 76.3-221.2z"
                clip-path="url(#b)" />
            <path fill="#5aaee2"
                d="M172.4 1124.8c-2.9-4.8-5.7-9.6-8.4-14.5-53-94.8-341.9-170.9-462.7-25.7-70.8 85.1-124.2 146.9-87.2 287.3 17.5 66.3 104.5 204.2 288.5 199.8 0 0 250.6 10.3 314.1-217.1 28-99.9-26.6-200.7-44.3-229.8z"
                clip-path="url(#b)" />
            <path fill="#ffdc00"
                d="M2775.3 941.5c-.2-7-.2-14-.1-21 1.7-136.2-264.7-399.8-486.9-317.6-130.2 48.2-227 81.9-274.6 257.8-22.5 83-14.3 287.4 188.5 397.8 0 0 265.9 168 477.4-39.3 92.9-91.3 96.8-235 95.7-277.7z"
                clip-path="url(#b)" />
        </svg>

        <div
            class="container relative mx-auto flex flex-col-reverse items-center justify-between gap-8 pt-36 lg:flex-row lg:pt-48">
            <div class="max-w-lg flex-1">

                <h1 class="bold-text-light-teal text-4xl font-bold !tracking-normal text-teal lg:text-5xl 2xl:text-6xl">
                    {!! Str::of($page->title)->inlineMarkdown() !!} </h1>
                <p class="mt-6 text-xl font-bold leading-tight text-gray">{{ $page->introduction }}</p>
            </div>
            <x-image-mask class="mx-auto h-auto w-96 max-w-[80%]"> <x-library-image conversion="square" :image="$page->image"
                    class="relative block h-auto w-full" />
            </x-image-mask>
        </div>

    </div>

    <livewire:podcasts :parentPage="$page" :language="$language" />
    @include('flexible.newsletter')
@endsection
