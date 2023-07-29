<div class="container mx-auto max-w-5xl py-36">
    <p class="text-3xl font-bold">{{ $layout->pre_title }}</p>
    <h2 class="text-3xl font-bold">{{ $layout->title }}</h2>
    <div>@markdown($layout->intro)</div>

    @if ($layout->quotes)
        <div class="flex flex-row gap-4">
            @foreach ($layout->quotes as $quote)
                <div class="rounded-3xl border p-4">
                    <div>{{ $quote->quote }}</div>
                </div>
            @endforeach
        </div>
    @endif

    <div>@markdown($layout->outro)</div>

</div>
