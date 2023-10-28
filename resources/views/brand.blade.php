@extends('layouts.default', ['theme' => null])

@section('content')
    <div class="container mx-auto my-48 max-w-4xl">
        <h1 class="type-xl">Heading 1</h1>
        <h1 class="type-lg">Heading 2</h1>
        <h1 class="type-md">Heading 3</h1>
        <h1 class="type-sm">Heading 4</h1>
        <h1 class="type-xs">Heading 5</h1>
        @svg('squiggle', 'mt-16 h-auto w-64')
        <div class="prose-standout prose my-16">
            <p class=""><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur.</strong></p>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur.</p>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur.</p>
        </div>
        @svg('squiggle', 'mb-12 h-auto w-64')
        <x-button-link href="#">Plain button</x-button-link>
        <x-button-link class="shadow-yellow" href="#">Yellow button</x-button-link>
    </div>
@endsection
