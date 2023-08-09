@section('image', $page->image?->getUrl('thumbnail'))
@section('title', $page->title)
@extends('layouts.app') @section('templatecontent')
    <div x-data="{ activeSection: null }">

        <header class="top-0 z-20 bg-white bg-opacity-90 lg:sticky lg:shadow lg:shadow-[#f5f5f5] lg:backdrop-blur">
            <div class="container mx-auto flex flex-row items-center">
                <a href="#home" class="relative z-20 flex flex-row items-center gap-2 overflow-hidden">@svg('jol-logo', 'my-4 h-8 lg:h-10 w-auto')
                    @if ($language)
                        <span class="font-logo uppercase tracking-widest text-light-teal lg:text-xl">
                            {{ $language->name }}</span>
                    @endif
                </a>

                <nav class="ml-auto hidden flex-row items-center gap-8 lg:flex">

                    @foreach ($page->content->filter(fn($layout) => $layout->show_in_menu) as $layout)
                        @if ($layout->show_as_button)
                            <x-button-link x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }" @click="sectionMenuOpen = false;" ::href="`#${section}`"
                                ::class="{ 'text-teal': activeSection == section }" class="shadow-yellow">
                                {{ $layout->pre_title ?? $layout->title }}
                            </x-button-link>
                        @else
                            <a x-data="{ section: '{{ Str::of($layout->title)->slug() }}' }" @click="sectionMenuOpen = false;"
                                class="text-border-b-4 border-transparent font-semibold text-teal" :href="`#${section}`"
                                :class="{ '!border-yellow': activeSection == section }">{{ $layout->pre_title ?? $layout->title }}</a>
                        @endif
                    @endforeach

                </nav>
            </div>
        </header>
        <section id="home" x-intersect:enter="activeSection = 'home'">

            @foreach ($page->content as $layout)
                @if ($layout->show_in_menu)
                    @php($jump_target = $page->content->filter(fn($layout) => $layout->show_in_menu && $layout->show_as_button)->first())

                    @if (Str::of($jump_target->title)->slug() != Str::of($layout->title)->slug())
                        @include('flexible.jump-cta', [
                            'layout' => (object) [
                                'title' => 'Ready to join?',
                                'new_tab' => false,
                                'button_text' => $jump_target->pre_title ?? $jump_target->title,
                                'button_link' => '#' . Str::of($jump_target->title)->slug(),
                            ],
                        ])
                    @else
                        <hr class="border-t-[3px] border-black">
                    @endif
        </section>

        <section id="{{ Str::of($layout->title)->slug() }}" class="<odd:bg-opacity- 0.05= odd:bg-light-teal"">
            </odd:bg-opacity->"
            x-intersect:enter="activeSection = '{{ Str::of($layout->title)->slug() }}'">
            @endif

            @include('flexible.' . $layout->name(), [
                'layout' => $layout,
            ])
            @endforeach
        </section>

    </div>
@endsection
