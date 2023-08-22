<div class="sticky top-0 z-10 w-full bg-yellow py-4 lg:static lg:cursor-default lg:bg-transparent">
    <h2 id="{{ Str::of($layout->title)->kebab }}"
        class="{{ $class ?? 'mx-auto max-w-7xl' }} container flex w-full flex-row items-center justify-between text-lg font-bold lg:text-4xl">
        {{ $layout->title }}

    </h2>

</div>
