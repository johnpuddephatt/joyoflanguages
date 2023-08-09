    <div x-data="{}"
        class="bg-{{ $layout->colour ?? 'teal-light' }} {{ $class ?? 'mx-auto max-w-6xl' }} container relative mb-24 block py-8 md:grid md:grid-cols-2 lg:py-16">

        <x-library-image :image="$layout->image" conversion="uncropped" class="w-full max-w-none" />

        <div
            class="{{ $layout->reverse ? 'order-first' : null }} relative z-10 flex flex-col items-start justify-center px-8 py-8">
            <h1 class="mb-4 max-w-lg text-2xl font-bold lg:text-2xl">{!! $layout->title !!}</h1>

            @if ($layout->text)
                <div class="mb-8 max-w-sm">@markdown($layout->text)</div>
            @endif

            @if ($layout->content)
                <x-button @click="$refs.modal_{{ Str::of($layout->title)->snake() }}.showModal()">Read more</x-button>
            @endif
        </div>

        @if ($layout->content)
            <dialog
                class="z-50 w-full max-w-md rounded-3xl border-2 border-black p-8 backdrop:bg-beige backdrop:bg-opacity-20 backdrop:backdrop-blur-md"
                x-ref="modal_{{ Str::of($layout->title)->snake() }}">
                <form method="dialog">
                    <button
                        class="ml-auto block w-10 before:fixed before:inset-0 before:-z-10 before:bg-white before:bg-opacity-50"
                        @click="$refs.modal_{{ Str::of($layout->title)->snake() }}.close()"
                        aria-label="Close modal window">@svg('plus', ' rotate-45 border-2 p-2 rounded-full w-10 h-10')</button>

                    <h2 class="text-2xl font-bold">{{ $layout->title }}</h2>

                    <div class="mt-8 max-w-sm">@markdown($layout->content)</div>
                </form>
            </dialog>
        @endif
    </div>
