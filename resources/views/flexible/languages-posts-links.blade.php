<div class="container mx-auto my-24">
    <h2 class="mb-12 text-center text-4xl font-bold">{{ $layout->title }}</h2>

    <div class="mb-12 flex flex-row justify-center gap-12">
        @foreach ($layout->languages as $language)
            <div class="flex w-1/3 flex-col rounded-3xl bg-beige p-8 text-center">

                <img class="mx-auto mb-4 h-36 w-36" src="{{ Storage::disk('public')->url($language->image) }}" />
                <h3 class="mb-auto pb-16 text-3xl font-bold">{{ $language->name }}</h3>

                <x-button-link href="{{ $language->blog_link }}" class="shadow-white">Read {{ $language->name }}
                    posts</x-button-link>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        <x-button-link class="shadow-pink" href="{{ $layout->button_url ?? $layout->posts_link }}">View all
            articles</x-button-link>
    </div>
</div>
