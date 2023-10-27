<div>
    <div class="container mx-auto max-w-5xl divide-y divide-light-teal divide-opacity-70 pb-16 pt-0 lg:py-16 2xl:py-24">
        <div class="flex flex-row gap-1 py-6">

            <div
                class="mr-auto flex w-full flex-1 flex-row items-center rounded-full border-2 border-light-teal border-opacity-20 py-2 pl-4 pr-2 ring-light-teal focus-within:ring-2 lg:max-w-md">
                @svg('search', 'w-5 h-5 inline-block align-middle mr-3')
                <input class="flex-1 appearance-none focus:outline-none" wire:model="search" type="search"
                    placeholder="Search posts by title...">

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
