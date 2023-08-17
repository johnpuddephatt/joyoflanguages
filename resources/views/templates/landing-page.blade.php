@section('image', $page->image?->getUrl('thumbnail'))
@section('title', $page->title)
@extends('layouts.app', ['language' => $page->language, 'theme' => $page->theme]) @section('templatecontent')
    <div x-data="{ activeSection: null, stuck: false }">
        <div class="-top-4 z-40 h-px lg:sticky" x-intersect:leave="stuck = true" x-intersect:enter="stuck = false">
            <header :class="{ '!bg-opacity-90 lg:shadow lg:shadow-[#f5f5f5] lg:backdrop-blur': stuck }"
                class="w-full bg-white bg-opacity-0 pt-4 transition duration-500">
                <div class="container mx-auto flex max-w-none flex-row items-center">
                    <a href="#home" class="relative z-20 flex flex-row items-center gap-2 overflow-hidden">@svg('jol-logo', 'my-4 h-8 lg:h-10 w-auto')
                        @if ($language)
                            <span class="font-logo uppercase tracking-widest text-light-teal lg:text-xl">
                                {{ $language->name }}</span>
                        @endif
                    </a>

                    <nav class="ml-auto hidden flex-row items-center gap-6 lg:flex 2xl:gap-12">

                        @foreach ($page->content->filter(fn($layout) => $layout->show_in_menu) as $layout)
                            @if ($layout->show_as_button)
                                <x-button-link x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }" @click="sectionMenuOpen = false;" ::href="`#${section}`"
                                    class="px-20 shadow-yellow">
                                    {{ $layout->pre_title ?? $layout->title }}
                                </x-button-link>
                            @else
                                <a x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }" @click="sectionMenuOpen = false;"
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

        </section>

        <section id="{{ Str::of($layout->title)->slug() }}" class=""
            x-intersect:enter.threshold.10="activeSection = '{{ Str::of($layout->title)->slug() }}'">
            @endif

            @includeIf('flexible.' . $layout->name(), [
                'layout' => $layout,
            ])
            @endforeach
        </section>

    </div>
@endsection
