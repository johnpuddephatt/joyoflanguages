    <p class="text-center text-lg font-bold text-light-teal lg:text-2xl">{{ $layout->pre_title }}</p>
    <h2 class="text-balance mt-2 text-center text-2xl font-bold lg:text-4xl">{{ $layout->title }}</h2>
    @if ($layout->intro)
        <div class="mx-auto mt-6 max-w-lg text-center font-semibold">@markdown($layout->intro)</div>
    @endif
