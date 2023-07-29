<div class="container my-24 mx-auto max-w-7xl">
    <h2 class="mb-12 text-center text-4xl font-bold">{{ $layout->title }}</h2>

    <div class="flex flex-row gap-4">
        @foreach ($layout->languages as $language)
            <div class="flex flex-col rounded-3xl bg-beige p-4 text-center">
                <h3 class="text-3xl font-bold">{{ $language->name }}</h3>

                <x-button-link href="{{ $language->blog_link }}" class="shadow-white">Read {{ $language->name }}
                    posts</x-button-link>
            </div>
        @endforeach
    </div>
</div>
