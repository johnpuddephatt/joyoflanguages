@extends('layouts.app')
@push('head')
    @cookieconsentscripts
@endpush

@push('footer')
    @cookieconsentview
@endpush
@section('templatecontent')
    <x-header :$language :$theme />

    <main class="relative">
        @yield('content')
    </main>

    <x-footer />
@endsection
