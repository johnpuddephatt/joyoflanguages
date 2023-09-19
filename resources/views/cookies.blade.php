@extends('layouts.default', ['theme' => null])

@section('content')
    <div class="container mx-auto my-48 max-w-4xl">
        <h2 class="type-lg">How this site uses cookies</h2>

        <p class="mb-2">You can update your cookie preferences for this site at any time using the button below.</p>
        @cookieconsentbutton(action: 'reset', label: 'Manage your cookie preferences')

        <div class="prose">
            @foreach (Cookies::getCategories() as $category)
                <table>
                    <caption class="mb-8 mt-16 text-left text-xl font-bold">{{ $category->title }}</caption>
                    <thead>
                        <tr>
                            <th>Cookie</th>
                            <th>Description</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->getCookies() as $cookie)
                            <tr>
                                <td>{{ $cookie->name }}</td>
                                <td>{{ $cookie->description }}</td>
                                <td>{{ \Carbon\CarbonInterval::minutes($cookie->duration)->cascade() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection
