@section('image', $page->image?->getUrl('thumbnail'))
@section('title', $page->title)
@section('description', $page->introduction)

@extends('layouts.app', ['language' => $page->language, 'theme' => $page->theme]) @section('templatecontent')

    <script type="text/javascript">
        !(function(e, t, n) {
            function a() {
                var e = t.getElementsByTagName('script')[0],
                    n = t.createElement('script');
                (n.type = 'text/javascript'),
                (n.async = !0),
                (n.src = 'https://beacon-v2.helpscout.net'),
                e.parentNode.insertBefore(n, e);
            }
            if (
                ((e.Beacon = n =
                        function(t, n, a) {
                            e.Beacon.readyQueue.push({
                                method: t,
                                options: n,
                                data: a,
                            });
                        }),
                    (n.readyQueue = []),
                    'complete' === t.readyState)
            )
                return a();
            e.attachEvent ?
                e.attachEvent('onload', a) :
                e.addEventListener('load', a, !1);
        })(window, document, window.Beacon || function() {});
    </script>
    <script type="text/javascript">
        window.Beacon('config', {
            hideFABLabelOnMobile: true,
            color: '#4dacb7',
            display: {
                zIndex: '60',
                style: 'iconAndText',
                iconImage: 'buoy',
                text: 'Have a question?',
            },
        });
        window.Beacon('init', 'd665d709-87f7-427b-994a-9089787faf0c');
    </script>

    <div x-data="{ beaconOpen: false, menuOpen: false, activeSection: null, stuck: false }" x-init="window.Beacon('on', 'open', () => (beaconOpen = true));
    window.Beacon('on', 'close', () => (beaconOpen = false));">
        <div class="fixed inset-0 z-50 hidden bg-black bg-opacity-25 lg:block" x-show="beaconOpen"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            @click="window.Beacon('close'), beaconOpen = false"></div>
        <x-button
            class="!fixed bottom-4 right-4 z-30 flex hidden flex-row items-center !border-none !bg-light-teal !px-3 !text-white lg:block"
            @click="window.Beacon('toggle'),beaconOpen = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="mr-1 inline-block h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
            </svg>
            Have a question?</x-button>

        <div class="-top-8 z-40 h-px lg:sticky" x-intersect:leave="stuck = true" x-intersect:enter="stuck = false">
            <header :class="{ '!bg-opacity-90 lg:shadow lg:shadow-[#f5f5f5] lg:backdrop-blur': stuck }"
                class="w-full bg-white bg-opacity-0 pt-4 transition duration-500 lg:pt-8">
                <div class="container mx-auto flex max-w-none flex-row items-center max-lg:justify-center">
                    <a href="#home"
                        class="relative z-20 flex flex-row items-center gap-2 overflow-hidden">@svg('jol-logo', 'my-3 h-10 lg:h-12 w-auto')
                        @if ($language)
                            <span class="font-logo text-xl uppercase tracking-widest text-light-teal lg:text-2xl">
                                {{ $language->name }}</span>
                        @endif
                    </a>

                    <nav :class="!menuOpen && 'max-lg:translate-x-full'"
                        class="fixed z-30 ml-auto flex flex-col items-center gap-12 bg-yellow py-12 text-lg transition max-lg:inset-0 lg:relative lg:flex-row lg:justify-start lg:bg-transparent lg:py-0 2xl:gap-12">

                        <x-button aria-label="Close navigation menu" title="Close navigation menu"
                            class="!leading-0 !absolute right-3 top-6 flex flex-row items-center gap-1 !border-2 !px-0 !py-0 font-semibold text-black shadow-yellow lg:hidden"
                            @click="menuOpen = false">
                            @svg('plus', 'h-auto rotate-45 w-10 p-2')

                        </x-button>

                        <nav class="my-auto flex w-full flex-col items-center gap-6 lg:flex-row lg:justify-start lg:gap-12">
                            @foreach ($page->content->filter(fn($layout) => $layout->show_in_menu) as $layout)
                                @if ($layout->show_as_button)
                                    <x-button-link @click="menuOpen = false" x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }"
                                        @click="sectionMenuOpen = false;" ::href="`#${section}`"
                                        class="px-16 shadow-white lg:shadow-yellow">
                                        {{ $layout->pre_title ?? $layout->title }}
                                    </x-button-link>
                                @else
                                    <a @click="menuOpen = false" x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }" @click="sectionMenuOpen = false;"
                                        class="border-b-[3px] border-transparent font-semibold text-teal"
                                        :href="`#${section}`"
                                        :class="{ '!border-yellow': activeSection == section }">{{ $layout->pre_title ?? $layout->title }}</a>
                                @endif
                            @endforeach
                        </nav>

                        <x-button
                            class="mt-20 flex flex-row items-center !border-none !bg-light-teal !px-3 !text-white lg:hidden"
                            @click="window.Beacon('toggle'),beaconOpen = true">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="mr-1 inline-block h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                            </svg>
                            Have a question?</x-button>

                    </nav>
                </div>
            </header>
        </div>

        <section id="home" x-intersect:enter="activeSection = 'home'">
            @foreach ($page->content as $layout)
                @if ($layout->show_in_menu)
                    @php($jump_target = $page->content->filter(fn($layout) => $layout->show_in_menu && $layout->show_as_button)->first())

                    @if (!$jump_target)
                        <p>A jump link was added but no jump target was found. Try setting a block to display in the menu as
                            a button</p>
                    @else
                        @if (Str::of($jump_target->title)->slug() != Str::of($layout->title)->slug())
                            @include('flexible.jump-cta', [
                                'layout' => (object) [
                                    'title' => 'Ready to join?',
                                    'new_tab' => false,
                                    'button_text' => 'Sign up now!',
                                    'button_link' => '#' . Str::of($jump_target->title)->slug(),
                                    'background_colour' => $page->content[$loop->index - 1]?->background_colour,
                                ],
                            ])
                        @else
                            <hr class="border-t-[3px] border-black">
                        @endif
                    @endif

        </section>

        <section id="{{ Str::of($layout->title)->slug() }}" class=""
            x-intersect:enter.threshold.10="activeSection = '{{ Str::of($layout->title)->slug() }}'">
            @endif

            @includeIf('flexible.' . $layout->name(), [
                'layout' => $layout,
            ])
            @endforeach
        </section>

        <nav class="sticky bottom-0 z-20 bg-yellow pb-3.5 pt-2 text-lg shadow-lg lg:hidden">
            <div class="container flex flex-row items-center gap-6">
                <button @click="menuOpen = true" class="mr-auto flex flex-row items-center gap-1 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-auto w-12" width="26.04" height="25.71"
                        viewBox="0 0 26.04 25.71">
                        <defs>
                            <style>
                                .prefix__cls-2djajs786 {
                                    fill: #fff;
                                    stroke: #12171e;
                                    stroke-linecap: round;
                                    stroke-linejoin: round;
                                    stroke-width: 1.17px
                                }
                            </style>
                        </defs>
                        <circle cx="14.44" cy="14.12" r="11.6" fill="#fff" />
                        <circle cx="12.18" cy="12.18" r="11.6" class="prefix__cls-2djajs786" />
                        <path d="M6.03 8.86h12.3M6.03 12.36h12.3M6.03 15.87h12.3" class="prefix__cls-2djajs786" />
                    </svg>

                    Menu</button>

                @foreach ($page->content->filter(fn($layout) => $layout->show_in_menu && $layout->show_as_button) as $layout)
                    <x-button-link x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }" @click="sectionMenuOpen = false;" ::href="`#${section}`"
                        class="shadow-white">
                        {{ $layout->pre_title ?? $layout->title }}
                    </x-button-link>
                @endforeach

        </nav>
    </div>

    <x-footer />
@endsection
