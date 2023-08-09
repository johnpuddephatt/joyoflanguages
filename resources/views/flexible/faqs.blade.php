<div class="container mx-auto max-w-4xl py-16" x-data="{ showing: {{ $layout->number_shown ?? 5 }} }">
    @include('components.block-intro', ['layout' => $layout])

    <div class="mt-16 flex flex-col border-b border-teal" x-data="{ current: null }">
        @foreach ($layout->faqs as $faq)
            <details x-transition x-show="{{ $loop->index }} < showing"
                class="border-t border-light-teal marker:text-light-teal" :open="current == {{ $loop->index }}">
                <summary @click.prevent="current = (current == {{ $loop->index }}) ? null : {{ $loop->index }}"
                    class="cursor-pointer px-2 py-4 text-xl font-semibold transition hover:bg-light-teal hover:bg-opacity-10">
                    {{ $faq->question }}</summary>
                <div class="prose pb-4 pl-7 pr-4 pt-4">@markdown($faq->answer)</div>
            </details>
        @endforeach
    </div>

    <x-button @click="showing = showing + {{ $layout->number_shown ?? 5 }}" x-show="showing < {{ count($layout->faqs) }}"
        class="mx-auto mt-8 !block after:!bg-light-teal">Show more questions</x-button>
</div>
