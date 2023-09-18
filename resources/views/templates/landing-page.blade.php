@section('image', $page->image?->getUrl('thumbnail'))
@section('title', $page->title)
@extends('layouts.app', ['language' => $page->language, 'theme' => $page->theme]) @section('templatecontent')
    <div x-data="{ menuOpen: false, activeSection: null, stuck: false }">
        <div class="-top-8 z-40 h-px lg:sticky" x-intersect:leave="stuck = true" x-intersect:enter="stuck = false">
            <header :class="{ '!bg-opacity-90 lg:shadow lg:shadow-[#f5f5f5] lg:backdrop-blur': stuck }"
                class="w-full bg-white bg-opacity-0 pt-4 transition duration-500 lg:pt-8">
                <div class="container mx-auto flex max-w-none flex-row items-center max-lg:justify-center">
                    <a href="#home" class="relative z-20 flex flex-row items-center gap-2 overflow-hidden">@svg('jol-logo', 'my-3 h-10 lg:h-12 w-auto')
                        @if ($language)
                            <span class="font-logo text-xl uppercase tracking-widest text-light-teal lg:text-2xl">
                                {{ $language->name }}</span>
                        @endif
                    </a>

                    <nav :class="!menuOpen && 'max-lg:translate-x-full'"
                        class="fixed z-30 ml-auto flex flex-col items-center justify-center gap-6 bg-yellow text-lg transition max-lg:inset-0 lg:relative lg:flex-row lg:justify-start lg:bg-transparent 2xl:gap-12">

                        <x-button aria-label="Close navigation menu" title="Close navigation menu"
                            class="!leading-0 !absolute right-3 top-6 flex flex-row items-center gap-1 !border-2 !px-0 !py-0 font-semibold text-black shadow-yellow lg:hidden"
                            @click="menuOpen = false">
                            @svg('plus', 'h-auto rotate-45 w-10 p-2')

                        </x-button>

                        @foreach ($page->content->filter(fn($layout) => $layout->show_in_menu) as $layout)
                            @if ($layout->show_as_button)
                                <x-button-link @click="menuOpen = false" x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }"
                                    @click="sectionMenuOpen = false;" ::href="`#${section}`"
                                    class="px-20 shadow-white lg:shadow-yellow">
                                    {{ $layout->pre_title ?? $layout->title }}
                                </x-button-link>
                            @else
                                <a @click="menuOpen = false" x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }" @click="sectionMenuOpen = false;"
                                    class="border-b-[3px] border-transparent font-semibold text-teal" :href="`#${section}`"
                                    :class="{ '!border-yellow': activeSection == section }">{{ $layout->pre_title ?? $layout->title }}</a>
                            @endif
                        @endforeach

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
            <div class="container flex flex-row items-center justify-between gap-6">
                <button @click="menuOpen = true" class="flex flex-row items-center gap-1 font-semibold">
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

            </div>
        </nav>

    </div>

    <x-footer />
@endsection
