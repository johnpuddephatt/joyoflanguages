@section('image', $user->photo?->getUrl('thumbnail'))

@section('title', $user->name)
@extends('layouts.default') @section('content')
    @include('components.user-hero')

    <div class="min-h-[50vh] bg-white pb-32 pt-8 lg:pt-16">
        <div class="container">
            <div class="type-lg">{{ $user->role }}</div>
            <div class="prose mt-8 lg:mt-16">
                {!! $user->biography !!}

                @if ($user->email)
                    <a class="border-red type-sm border-b-2 !no-underline"
                        href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                @endif
            </div>
        </div>
    </div>
@endsection
