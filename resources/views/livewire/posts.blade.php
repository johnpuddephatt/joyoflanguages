<div>
    <div class="container mx-auto max-w-5xl divide-y divide-light-teal divide-opacity-70 pb-16 pt-0 lg:py-24">
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
                class="mr-auto flex w-full max-w-sm flex-row items-center rounded-full border-2 border-light-teal border-opacity-20 py-2 pl-4 pr-6 ring-light-teal focus-within:ring-2">
                @svg('search', 'w-5 h-5 inline-block align-middle mr-3')
                <input class="flex-1 appearance-none focus:outline-none" wire:model="search" type="search"
                    placeholder="Search posts by title...">
            </div>

            @foreach (['asc' => 'Oldest first', 'desc' => 'Newest first'] as $orderValue => $orderLabel)
                <x-button
                    class="{{ $order == $orderValue ? ' !text-black border-opacity-90 ' : 'border-opacity-20' }} hidden flex-none border-light-teal !px-6 !font-semibold text-gray lg:block"
                    wire:click="$set('order', '{{ $orderValue }}')">
                    {{ $orderLabel }}
                </x-button>
            @endforeach
        </div>
        @if (!$posts->count())
            <p class="py-16 text-center font-bold">No matching posts found</p>
        @endif
        @foreach ($posts as $post)
            <x-post.card-wide-alt :post="$post" />
        @endforeach
        <div class="pt-16">
            {{ $posts->links() }}
        </div>
    </div>
</div>
