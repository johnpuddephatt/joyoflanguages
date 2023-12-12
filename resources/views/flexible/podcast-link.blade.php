@if ($layout->podcast)
    <div id="{{ $layout ? $layout->key() : null }}" class="{{ $class ?? ' mx-auto max-w-4xl' }} container py-12">

        <div class="relative flex flex-row items-center gap-6 bg-beige bg-opacity-30 p-4 pr-6">
            <x-image-mask class="hidden h-auto w-24 rounded-3xl bg-yellow p-4 lg:block lg:w-56">
                <x-library-image conversion="square" class="relative block h-auto w-full" :image="\App\Models\Page::where('template', 'App\Nova\Templates\PodcastsPageTemplate')
                    ->where('language_id', $page->language?->id)
                    ->first()->image ?? null" />
            </x-image-mask>
            <div class="relative">
                <p class="bold-text-light-teal type-sm !mb-0.5 font-bold text-teal">Learn Italian
                    <strong>Podcast</strong>
                <h3 class="type-sm mb-4 max-w-2xl"> {{ $layout->podcast->title }}</h3>

                <x-button-link href="{{ $layout->podcast->url }}" class="mx-auto shadow-yellow">
                    Listen now</x-button-link>
            </div>
        </div>
    </div>
@endif
