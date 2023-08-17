    {{-- <p class="text-center text-lg font-bold text-light-teal lg:text-2xl">{{ $layout->pre_title }}</p> --}}
    <h2 class="type-xl mx-auto mt-2 max-w-xl text-center">{{ $layout->title }}</h2>
    @if ($layout->intro)
        <div class="mx-auto mt-6 max-w-lg text-center text-lg font-semibold leading-tight">@markdown($layout->intro)</div>
    @endif
