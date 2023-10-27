@php($page = $page->parent ? $page->parent : $page)
<div class="bg-gray py-24 lg:order-none xl:pl-0">
    <div class="container grid grid-cols-2">
        <h2 class="text-4xl font-bold text-teal">Keep reading</h2>
        <div class="px-12">
            <nav class="space-y-2">
                <p class="type-md"><a
                        class="@if (url($page->url) == request()->url()) border-lilac @else border-transparent @endif border-b-4"
                        href="{{ $page->url }}">{{ $page->title }}</a></p>

                @foreach ($page->children as $child)
                    <p class="type-md"><a
                            class="@if (url($child->url) == request()->url()) border-lilac @else border-transparent @endif border-b-4"
                            href="{{ url($child->url) }}">{{ $child->title }}</a></p>
                @endforeach
            </nav>
        </div>
    </div>

</div>
