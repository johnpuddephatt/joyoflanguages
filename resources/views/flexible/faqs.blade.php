<div id="{{ $layout ? $layout->key() : null }}" class="pb-12 pt-20 text-center 2xl:pb-16 2xl:pt-32"
    x-data="{ showing: {{ $layout->number_shown ?? 5 }} }">
    <div class="mx-auto max-w-2xl">
        @include('components.block-intro', ['layout' => $layout])
    </div>
    <div class="mx-auto text-left lg:container">
        <div class="border-teal mt-12 flex flex-col border-b lg:mt-16" x-data="{ current: null }">
            @foreach ($layout->faqs as $faq)
                <details x-transition x-show="{{ $loop->index }} < showing"
                    class="border-light-teal marker:text-light-teal border-t" :open="current == {{ $loop->index }}">
                    <summary
                        @click.prevent="current = (current == {{ $loop->index }}) ? null : {{ $loop->index }}; setTimeout(()=> $el.scrollIntoView({ behavior: 'smooth', block: 'start' }), 200)"
                        class="hover:bg-light-teal cursor-pointer scroll-mt-24 px-2 py-4 text-xl font-semibold transition hover:bg-opacity-10">
                        {{ $faq->question }}</summary>
                    <div class="prose prose-lg pb-12 pl-7 pr-4 pt-4">@markdown($faq->answer)</div>
                </details>
            @endforeach
        </div>
    </div>

    <x-button x-on:click="showing = showing + {{ $layout->number_shown ?? 5 }}"
        x-show="showing < {{ count($layout->faqs) }}" class="after:!bg-light-teal mx-auto mt-12">Show more
        questions</x-button>
</div>
