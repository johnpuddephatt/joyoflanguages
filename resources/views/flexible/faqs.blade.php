<div class="container mx-auto my-36 max-w-5xl">
    <h2 class="text-3xl font-bold">{{ $layout->title }}</h2>
    <div>@markdown($layout->description)</div>

    <div class="flex flex-col gap-4">
        @foreach ($layout->faqs as $faq)
            <div class="rounded-3xl border p-4">
                <h3>{{ $faq->question }}</h3>
                <div>@markdown($faq->answer)</div>
            </div>
        @endforeach
    </div>
</div>
