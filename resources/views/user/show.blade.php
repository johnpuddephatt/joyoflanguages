@section('image', $user->photo?->getUrl('thumbnail'))

@section('title', $user->name)
@extends('layouts.default') @section('content')
    @include('components.user-hero')

    <div class="min-h-[50vh] bg-white pt-8 pb-32 lg:pt-16">
        <div class="container">
            <div class="text-3xl font-bold lg:text-5xl">{{ $user->role }}</div>
            <div class="prose mt-8 lg:mt-16">
                {!! $user->biography !!}

                @if ($user->email)
                    <a class="border-b-2 border-red text-2xl font-bold !no-underline"
                        href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                @endif
            </div>
        </div>
    </div>
@endsection
