<header id="main-header" x-data="{ menuOpen: false }" x-cloak
    x-bind:class="menuOpen && 'max-lg:!translate-y-0 max-lg:!opacity-100'"
    class="{{ $theme == 'alternative_header' ? 'lg:text-white' : 'lg:text-teal' }} text-teal absolute left-0 top-0 z-40 w-full py-6 2xl:py-12">
    <div class="container mx-auto flex max-w-none flex-row items-center justify-between lg:items-start">
        <a class="relative z-20 flex flex-row items-center gap-1 overflow-hidden max-sm:-ml-2 lg:gap-2" href="/">
            @if ($theme == 'alternative_header')
                @svg('jol-logo-alt', 'h-9 lg:h-12 w-auto')
            @else
                @svg('jol-logo', ' h-9 lg:h-12 w-auto')
            @endif

            @if ($language)
                <span class="font-logo text-light-teal text-lg uppercase tracking-widest lg:text-2xl">
                    {{ $language->name }}</span>
            @endif
        </a>

        @if ($primary_menu)

            <x-button aria-label="Open navigation menu" title="Open navigation menu"
                class="!leading-0 shadow-yellow -mr-1 flex flex-row items-center gap-1 !border-2 !px-0 !py-0 font-semibold text-black lg:hidden"
                x-on:click="document.body.classList.add('overflow-hidden'); menuOpen = true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-auto w-8 md:w-10" width="26.04" height="25.71"
                    viewBox="0 0 26.04 25.71">
                    <defs>

                    </defs>
                    <!-- <circle cx="14.44" cy="14.12" r="11.6" fill="#fff" /> -->
                    <!-- <circle cx="12.18" cy="12.18" r="11.6" class="prefix__cls-2djajs786" /> -->
                    <path d="M6.03 8.86h12.3M6.03 12.36h12.3M6.03 15.87h12.3" fill="#fff" stroke="#12171e" />
                </svg>

            </x-button>

            <nav x-bind:class="menuOpen && 'max-lg:!translate-x-0'"
                class="max-lg:bg-yellow inset-0 z-10 flex flex-col items-start text-lg font-semibold transition max-lg:fixed max-lg:h-screen max-lg:translate-x-full max-lg:justify-center max-lg:p-8 max-md:p-4 lg:flex-row lg:gap-6">

                <x-button aria-label="Close navigation menu" title="Close navigation menu"
                    class="!leading-0 !absolute right-3 top-6 flex flex-row items-center gap-1 !border-2 !px-0 !py-0 font-semibold text-black shadow-white md:right-5 lg:hidden"
                    x-on:click="document.body.classList.remove('overflow-hidden'); menuOpen = false">
                    @svg('plus', 'h-auto rotate-45 w-10 p-2')

                </x-button>
                @foreach ($primary_menu['menuItems'] as $menu_item)
                    <div class="group relative">

                        @if (($menu_item['data']['type'] ?? false) == 'button')
                            <x-button-link target="{{ $menu_item['target'] ?? '_self' }}"
                                class="lg:shadow-yellow shadow-white max-lg:mt-6"
                                :href="$menu_item['value']">{{ $menu_item['name'] }}</x-button-link>
                        @else
                            <a class="inline-block rounded px-2 py-2 transition group-hover:bg-white group-hover:bg-opacity-10 lg:px-2 2xl:px-6"
                                href="{{ $menu_item['value'] }}" target="{{ $menu_item['target'] ?? '_self' }}">
                                {{ $menu_item['name'] }}
                            </a>
                        @endif
                        @if (count($menu_item['children']))
                            <div
                                class="ml-4 hidden pt-2 lg:pointer-events-none lg:absolute lg:top-full lg:z-40 lg:ml-0 lg:block lg:translate-y-2 lg:opacity-0 lg:transition lg:group-hover:pointer-events-auto lg:group-hover:translate-y-0 lg:group-hover:opacity-100">
                                <div
                                    class="bg-white backdrop-blur-xl lg:min-w-[12em] lg:divide-y lg:divide-[#0001] lg:overflow-hidden lg:rounded lg:bg-opacity-40">

                                    @foreach ($menu_item['children'] as $child_item)
                                        <a class="text-teal block truncate px-6 py-2 text-sm transition lg:text-black lg:hover:bg-white"
                                            href="{{ $child_item['value'] }}"
                                            target="{{ $menu_item['target'] ?? '_self' }}">
                                            {{ $child_item['name'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </nav>
        @endif
    </div>
</header>

<x-login-link class="bg-blue fixed bottom-4 right-4 z-10 ml-6 mt-2 rounded bg-opacity-20 p-4"
    redirect-url="{{ route('nova.pages.dashboard') }}" label="Admin login" />
