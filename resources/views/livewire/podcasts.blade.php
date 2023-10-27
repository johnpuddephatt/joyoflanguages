{{-- Livewire requires exactly one root element --}}
<div>
    <div class="container mx-auto max-w-5xl divide-y divide-light-teal divide-opacity-70 pb-16 lg:pt-12 2xl:py-24">
        <div class="flex flex-row gap-1 py-6">

            <div
                class="mr-auto flex w-full flex-1 flex-row items-center rounded-full border-2 border-light-teal border-opacity-20 py-2 pl-4 pr-2 ring-light-teal focus-within:ring-2 lg:max-w-md">
                @svg('search', 'w-5 h-5 inline-block align-middle mr-3')
                <input class="flex-1 appearance-none focus:outline-none" wire:model="search" type="search"
                    placeholder="Search podcasts by title or episode number...">

                @if ($tags)
                    @foreach (explode(',', $tags) as $tag)
                        <button wire:click="removeTag('{{ $tag }}')" aria-label="Remove {{ $tag }} tag"
                            title="Remove {{ $tag }} tag"
                            class="ml-1 flex-shrink-0 rounded-full bg-yellow px-4 py-1">#{{ $tag }}
                            @svg('plus', 'align-middle inline-block rotate-45 w-3 h-3')
                        </button>
                    @endforeach
                @endif
            </div>

            @foreach (['asc' => 'Oldest first', 'desc' => 'Newest first'] as $orderValue => $orderLabel)
                <x-button
                    class="{{ $order == $orderValue ? ' !text-black border-opacity-90 ' : 'border-opacity-20' }} hidden flex-none border-light-teal !px-6 !font-semibold text-gray lg:block"
                    wire:click="$set('order', '{{ $orderValue }}')">
                    {{ $orderLabel }}
                </x-button>
            @endforeach
        </div>
        @if (!$podcasts->count())
            <p class="py-16 text-center font-bold">No matching podcasts found</p>
        @endif
        @foreach ($podcasts as $podcast)
            <x-podcast.card :page="$parentPage" :podcast="$podcast" />
        @endforeach

        <div class="pt-16">

            {{ $podcasts->links() }}
        </div>
    </div>

</div>
