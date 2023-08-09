@extends('layouts.app')

@section('templatecontent')
    <x-header :$language />

    <main class="relative min-h-screen">
        @yield('content')
    </main>

    <x-footer />
@endsection
