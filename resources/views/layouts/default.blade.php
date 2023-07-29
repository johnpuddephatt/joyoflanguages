@extends('layouts.app')

@section('templatecontent')
    <x-header :$page />

    <main class="relative">
        @yield('content')
    </main>

    <x-footer />
@endsection
