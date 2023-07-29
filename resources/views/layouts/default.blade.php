@extends('layouts.app')

@section('templatecontent')
    <x-header :$page />

    <main class="relative min-h-screen">
        @yield('content')
    </main>

    <x-footer />
@endsection
