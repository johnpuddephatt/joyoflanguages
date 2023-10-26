<div class="container mx-auto">
    {{-- <p class="text-center text-lg font-bold text-light-teal lg:text-2xl">{{ $layout->pre_title }}</p> --}}
    <h2 class="type-xl">{{ $layout->title }}</h2>
    @if ($layout->intro)
        <div class="type-subtitle mx-auto mt-6 max-w-lg">@markdown($layout->intro)</div>
    @endif
</div>
