<div class="pb-12 pt-20 text-center 2xl:pb-16 2xl:pt-32" x-data="{ showing: {{ $layout->number_shown ?? 5 }} }">
    <div class="mx-auto max-w-2xl">
        @include('components.block-intro', ['layout' => $layout])
    </div>
    <div class="mx-auto text-left lg:container">
        <div class="mt-12 flex flex-col border-b border-teal lg:mt-16" x-data="{ current: null }">
            @foreach ($layout->faqs as $faq)
                <details x-transition x-show="{{ $loop->index }} < showing"
                    class="border-t border-light-teal marker:text-light-teal" :open="current == {{ $loop->index }}">
                    <summary
                        @click.prevent="current = (current == {{ $loop->index }}) ? null : {{ $loop->index }}; setTimeout(()=> $el.scrollIntoView({ behavior: 'smooth', block: 'start' }), 200)"
                        class="cursor-pointer scroll-mt-24 px-2 py-4 text-xl font-semibold transition hover:bg-light-teal hover:bg-opacity-10">
                        {{ $faq->question }}</summary>
                    <div class="prose prose-lg pb-12 pl-7 pr-4 pt-4">@markdown($faq->answer)</div>
                </details>
            @endforeach
        </div>
    </div>

    <x-button @click="showing = showing + {{ $layout->number_shown ?? 5 }}"
        x-show="showing < {{ count($layout->faqs) }}" class="mx-auto mt-12 after:!bg-light-teal">Show more
        questions</x-button>
</div>
