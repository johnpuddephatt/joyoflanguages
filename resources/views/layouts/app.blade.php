<!DOCTYPE html>
<html class="scroll-smooth leading-snug antialiased xl:text-lg xl:leading-snug 2xl:text-xl 2xl:leading-snug">

<head>

    @production
        @includeWhen(isset($settings['google_analytics']), 'analytics')
    @endproduction

    <title>
        @removeMarkdown(app()->view->getSections()['title']) | {{ config('app.name') }}
    </title>
    <meta name="description" content="@yield('description', config('app.description'))" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:image" content="@yield('image', 'fallback')" />

    <link rel="canonical" href="@yield('canonical', Request::url())" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/png" href="/favicon.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
    @livewireStyles

</head>

<body>
    <div class="w-screen">
        @yield('templatecontent')
    </div>
    @stack('footer')
    @livewireScripts

</body>

</html>
