{{-- Livewire requires exactly one root element --}}
<div>
    <div class="container mx-auto max-w-5xl divide-y divide-light-teal py-24">
        <div class="flex flex-row gap-1 py-6">
            @if ($tags)
                @foreach (explode(',', $tags) as $tag)
                    <button wire:click="removeTag('{{ $tag }}')" aria-label="Remove {{ $tag }} tag"
                        title="Remove {{ $tag }} tag"
                        class="rounded-full border-2 border-black px-4 py-2">#{{ $tag }}
                        @svg('plus', 'align-middle inline-block rotate-45 w-3 h-3')
                    </button>
                @endforeach
            @endif

            <div
                class="mr-auto flex w-full max-w-sm flex-row items-center rounded-full border-2 py-2 pl-4 pr-6 ring-light-teal focus-within:ring-2">
                @svg('search', 'w-5 h-5 inline-block align-middle mr-3')
                <input class="flex-1 appearance-none focus:outline-none" wire:model="search" type="search"
                    placeholder="Search podcasts by title...">
            </div>

            @foreach (['asc' => 'Oldest first', 'desc' => 'Newest first'] as $orderValue => $orderLabel)
                <button
                    class="{{ $order == $orderValue ? '!bg-opacity-100' : 'bg-opacity-0' }} rounded-full border-2 bg-yellow px-6 py-2 hover:bg-opacity-20"
                    wire:click="$set('order', '{{ $orderValue }}')">
                    {{ $orderLabel }}
                </button>
            @endforeach
        </div>
        @foreach ($podcasts as $podcast)
            <x-podcast.card :page="$parentPage" :podcast="$podcast" />
        @endforeach

        <div class="pt-16">
            {{ $podcasts->links() }}
        </div>
    </div>

</div>
