@section('image', $page->image?->getUrl('thumbnail'))
@section('title', $page->title)
@section('description', $page->introduction)
@push('head')
    <x-clarity::script />
@endpush
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
            mode: 'askFirst',
            docsEnabled: false,
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
            x-on:click="window.Beacon('close'), beaconOpen = false"></div>
        <x-button
            class="!bg-light-teal !fixed bottom-4 right-4 z-30 hidden flex-row items-center !border-none !pl-2 !pr-4 !text-white lg:flex"
            x-on:click="window.Beacon('toggle'),beaconOpen = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="mr-1 inline-block h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
            </svg>
            <div>
                Ask a question</div>
        </x-button>

        <div class="-top-6 z-40 h-px lg:sticky" x-intersect:leave="stuck = true" x-intersect:enter="stuck = false">
            <header x-bind:class="{ '!bg-opacity-90 lg:shadow lg:shadow-[#f5f5f5] lg:backdrop-blur': stuck }"
                class="w-full bg-white bg-opacity-0 py-6 transition duration-500 lg:pb-3 lg:pt-8">
                <div class="container mx-auto flex max-w-none flex-row items-center max-xl:!px-4 max-lg:justify-center">
                    <a href="#home"
                        class="relative z-20 flex flex-row items-center gap-2 overflow-hidden">@svg('jol-logo', 'h-9 lg:h-10 xl:h-12 w-auto')
                        @if ($language)
                            <span class="font-logo text-light-teal text-lg uppercase tracking-widest xl:text-2xl">
                                {{ $language->name }}</span>
                        @endif
                    </a>

                    <nav x-bind:class="!menuOpen && 'max-lg:translate-x-full'"
                        class="bg-yellow fixed z-30 ml-auto flex flex-col items-center gap-12 py-12 text-lg transition max-lg:inset-0 lg:relative lg:flex-row lg:justify-start lg:bg-transparent lg:py-0 2xl:gap-12">

                        <x-button aria-label="Close navigation menu" title="Close navigation menu"
                            class="!leading-0 shadow-yellow !absolute right-3 top-6 flex flex-row items-center gap-1 !border-2 !px-0 !py-0 font-semibold text-black lg:hidden"
                            x-on:click="document.body.classList.remove('overflow-hidden'); menuOpen = false">
                            @svg('plus', 'h-auto rotate-45 w-10 p-2')

                        </x-button>

                        <nav
                            class="my-auto flex w-full flex-col items-center gap-6 lg:flex-row lg:justify-start lg:gap-4 xl:gap-6 2xl:gap-12">
                            @foreach ($page->content->filter(fn($layout) => $layout->show_in_menu) as $layout)
                                @if ($layout->show_as_button)
                                    <x-button-link x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }"
                                        x-on:click="document.body.classList.remove('overflow-hidden'); menuOpen = false;"
                                        ::href="`#${section}`" class="lg:shadow-yellow !px-8 shadow-white 2xl:!px-16">
                                        {{ $layout->pre_title ?? $layout->title }}
                                    </x-button-link>
                                @else
                                    <a x-on:click="document.body.classList.remove('overflow-hidden'); menuOpen = false"
                                        x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }"
                                        class="text-teal border-b-[3px] border-transparent font-semibold transition duration-1000"
                                        :href="`#${section}`"
                                        x-bind:class="{ '!border-yellow': activeSection == section }">{{ $layout->pre_title ?? $layout->title }}</a>
                                @endif
                            @endforeach
                        </nav>

                        <x-button
                            class="!bg-light-teal mt-20 flex flex-row items-center !border-none !pl-2 !pr-4 !leading-none !text-white lg:hidden"
                            x-on:click="window.Beacon('toggle'),beaconOpen = true">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="mr-1 inline-block h-8 w-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                            </svg>
                            <div>Ask a question</div>
                        </x-button>

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

        <section class="-scroll-mt-6" id="{{ Str::of($layout->title)->slug() }}" class=""
            x-intersect:enter.threshold.10="activeSection = '{{ Str::of($layout->title)->slug() }}'">
            @endif

            @includeIf('flexible.' . $layout->name(), [
                'layout' => $layout,
            ])
            @endforeach
        </section>

        <nav class="bg-yellow sticky bottom-0 z-20 pb-1.5 pt-1 text-lg shadow-lg lg:hidden">
            <div class="container flex max-w-none flex-row items-center gap-6">
                <button x-on:click="document.body.classList.add('overflow-hidden'); menuOpen = true"
                    class="mr-auto flex flex-row items-center gap-1 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-auto w-12" width="26.04" height="25.71"
                        viewBox="0 0 26.04 25.71">
                        <defs>

                        </defs>
                        <circle cx="14.44" cy="14.12" r="11.6" fill="#fff" />
                        <circle cx="12.18" cy="12.18" r="11.6" fill="#fff" stroke="#12171e" />
                        <path d="M6.03 8.86h12.3M6.03 12.36h12.3M6.03 15.87h12.3" fill="#fff" stroke="#12171e" />
                    </svg>

                    Menu</button>

                @foreach ($page->content->filter(fn($layout) => $layout->show_in_menu && $layout->show_as_button) as $layout)
                    <x-button-link x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }" x-on:click="menuOpen = false;" ::href="`#${section}`"
                        class="shadow-white">
                        {{ $layout->pre_title ?? $layout->title }}
                    </x-button-link>
                @endforeach

        </nav>
    </div>

    <x-footer />
@endsection
