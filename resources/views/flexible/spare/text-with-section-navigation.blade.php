<div class="grid gap-8 bg-white py-8 lg:grid-cols-3 lg:py-16">
    <div class="prose:emphasise-first container prose lg:col-span-2 lg:gap-0">
        {!! $layout->main !!}
    </div>
    <div class="container order-first lg:order-none xl:pl-0">
        <hr class="mb-4 w-48 max-w-full border-t-2 border-teal-light" />

        @php($parent = $layout->sectionNavigation['parent'])
        <h3 class="mb-4 text-3xl font-bold"><a
                class="@if (url($parent->url) == request()->url()) border-lilac @else border-transparent @endif border-b-4"
                href="{{ $parent->url }}">{{ $parent->title }}</a></h3>

        <nav class="space-y-2">
            @foreach ($layout->sectionNavigation['children'] as $child)
                <p class="text-2xl font-bold"><a
                        class="@if (url($child->url) == request()->url()) border-lilac @else border-transparent @endif border-b-4"
                        href="{{ url($child->url) }}">{{ $child->title }}</a></p>
            @endforeach
        </nav>

    </div>
</div>
