@extends('layouts.app')

@section('templatecontent')
    <x-header />

    <main class="relative">
        @yield('content')
    </main>

    <x-footer />
@endsection
