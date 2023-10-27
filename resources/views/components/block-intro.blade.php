<div class="container mx-auto">
    <h2 class="type-xl">{{ $layout->title }}</h2>
    @if ($layout->intro)
        <div class="type-xs mx-auto mt-6 max-w-lg">@markdown($layout->intro)</div>
    @endif
</div>
