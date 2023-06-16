<div class="bg-white">
    <div class="container gap-x-24 py-8 md:grid md:grid-cols-2 lg:py-16 xl:grid-cols-3">
        <div class="xl:col-span-2">
            <div class="prose:emphasise-first prose max-w-lg">
                {!! $layout->description !!}
            </div>
        </div>
        @if (count($layout->links))
            <div class="space-y-6 max-lg:mt-12">
                @foreach ($layout->links as $link)
                    @php($page = \App\Models\Page::find($link->page))
                    <a class="block max-w-xs border-b-2 border-lilac text-3xl font-bold"
                        href="{{ $page->url }}">{{ $page->title }}</a>
                @endforeach
            </div>
        @endif
    </div>
</div>
