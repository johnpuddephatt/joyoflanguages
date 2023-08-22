<header id="main-header" x-data="{ menuOpen: false }" :class="menuOpen && 'max-lg:!translate-y-0 max-lg:!opacity-100'"
    class="{{ $theme == 'alternative_header' ? 'text-white' : 'lg:text-teal' }} absolute left-0 top-0 z-40 w-full py-6 text-white lg:py-12">
    <div class="container mx-auto flex max-w-none flex-row items-start justify-center lg:justify-between">
        <a class="relative z-20 flex flex-row items-center gap-2 overflow-hidden" href="/">
            @if ($theme == 'alternative_header')
                @svg('jol-logo-alt', ' h-12 w-auto')
            @else
                @svg('jol-logo', ' h-12 w-auto')
            @endif

            @if ($language)
                <span class="font-logo text-xl uppercase tracking-widest text-light-teal lg:text-2xl">
                    {{ $language->name }}</span>
            @endif
        </a>

        @if ($primary_menu)

            <div class="relative z-50 max-lg:absolute max-lg:right-4 max-lg:top-6 max-lg:hidden">
                <x-button class="max-lg:px-2 lg:hidden" @click="menuOpen = !menuOpen">Menu</x-button>
            </div>

            <nav :class="!menuOpen && 'max-lg:translate-x-full'"
                class="inset-0 z-10 flex flex-col items-start text-lg font-semibold transition max-lg:fixed max-lg:h-screen max-lg:justify-center max-lg:bg-orange max-lg:p-8 lg:flex-row lg:gap-6">

                @foreach ($primary_menu['menuItems'] as $menu_item)
                    <div class="group relative">

                        @if (($menu_item['data']['type'] ?? false) == 'button')
                            <x-button-link target="{{ $menu_item['target'] ?? '_self' }}" class="shadow-yellow"
                                :href="$menu_item['value']">{{ $menu_item['name'] }}</x-button-link>
                        @else
                            <a class="inline-block rounded px-6 py-2 transition group-hover:bg-white group-hover:bg-opacity-10"
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
                                        <a class="block truncate px-6 py-2 text-sm text-teal transition lg:text-black lg:hover:bg-white"
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

<x-login-link class="fixed bottom-4 right-4 z-10 ml-6 mt-2 rounded bg-blue bg-opacity-20 p-4"
    redirect-url="{{ route('nova.pages.dashboard') }}" label="Admin login" />
