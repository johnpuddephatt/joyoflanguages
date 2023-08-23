<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : ($this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1))

        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center">
            <div class="flex flex-1 justify-between sm:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <x-button disabled class="opacity-50">
                            {!! __('pagination.previous') !!}
                        </x-button>
                    @else
                        <x-button wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before">
                            {!! __('pagination.previous') !!}
                        </x-button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <x-button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before">
                            {!! __('pagination.next') !!}
                        </x-button>
                    @else
                        <x-button disabled class="opacity-50">

                            {!! __('pagination.next') !!}
                        </x-button>
                    @endif
                </span>
            </div>

            <div class="hidden sm:block">

                <div>
                    <span class="relative z-0 inline-flex gap-2">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <x-button disabled class="!px-3 opacity-50">
                                    &larr;

                                </x-button>
                            @else
                                <x-button wire:click="previousPage('{{ $paginator->getPageName() }}')" class="!px-3"
                                    dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                                    rel="prev" aria-label="{{ __('pagination.previous') }}">
                                    &larr;
                                </x-button>
                            @endif
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <x-button disabled class="!px-3 opacity-50">
                                    {{ $element }}</x-button>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span
                                        wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span
                                                    class="text-gray-500 border-gray-300 relative inline-flex h-11 w-11 cursor-default select-none items-center justify-center rounded-full border-[3px] border-black bg-yellow text-center font-bold">{{ $page }}</span>
                                            </span>
                                        @else
                                            <x-button class="!px-4"
                                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </x-button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <x-button wire:click="nextPage('{{ $paginator->getPageName() }}')" class="!px-3"
                                    dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                                    rel="next" aria-label="{{ __('pagination.next') }}">
                                    &rarr;
                                </x-button>
                            @else
                                <x-button disabled class="!px-3 opacity-50">
                                    &rarr;
                                </x-button>
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
