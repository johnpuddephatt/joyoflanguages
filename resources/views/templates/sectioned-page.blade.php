@section('image', $page->image?->getUrl('thumbnail'))
@section('title', $page->title)
@section('description', $page->introduction)

@extends('layouts.default', ['language' => $page->language, 'theme' => $page->theme]) @section('content')

    @foreach ($page->content as $key => $layout)
        @break($layout->name() === 'section')
        @include('flexible.' . $layout->name(), ['layout' => $layout])
        @php $page->content->forget($key) @endphp
    @endforeach

    <div x-data="{ sectionMenuOpen: false, activeSection: null }">

        <div class="flex flex-col lg:flex-row">
            <div
                class="2xl:container-lg top-0 flex-col justify-end px-6 py-6 !pr-4 transition lg:flex lg:w-[30%] lg:bg-yellow">

                <div class="lg:sticky lg:bottom-12 lg:max-w-xl">

                    <h2 class="hidden px-4 text-xl font-bold lg:block lg:pb-6 lg:pt-16">
                        On this page

                    </h2>

                    <nav :class="{
                        'translate-y-0': sectionMenuOpen,
                        'translate-y-full': !
                            sectionMenuOpen
                    }"
                        class="fixed inset-0 z-[999] flex flex-col justify-center bg-yellow text-center transition lg:static lg:translate-y-0 lg:bg-transparent lg:text-left">
                        <button class="lg:hidden" @click="sectionMenuOpen = false">
                            @svg('plus', 'mb-8 rotate-45 w-6 h-6 ml-auto mr-4')
                        </button>
                        @foreach ($page->content->filter(fn($layout) => $layout->name() === 'section') as $layout)
                            <a x-data="{ section: '{{ Str::of($layout->title)->kebab }}' }" @click="sectionMenuOpen = false; activeSection = section"
                                class="inline-block p-2 px-4 text-2xl font-bold lg:max-w-md 2xl:text-3xl"
                                :href="`#${section}`"
                                :class="{ 'bg-white bg-opacity-30 rounded': activeSection == section }">{{ $layout->title }}
                            </a>
                        @endforeach

                    </nav>
                </div>
            </div>

            <div class="flex-grow py-8 lg:pb-16">
                <div class="sticky top-0 z-20">
                    <x-button
                        class="!absolute right-1 top-3 !px-3 !py-1 max-sm:text-sm lg:right-2 lg:top-2 lg:hidden lg:!px-6 lg:!py-2"
                        @click="sectionMenuOpen = true">
                        Jump to a section
                    </x-button>
                </div>
                @foreach ($page->content as $layout)
                    @if ($layout->name() === 'section' && !$loop->first)
                        </section>
                    @endif

                    @if ($layout->name() === 'section')
                        @include('flexible.' . $layout->name(), [
                            'layout' => $layout,
                            'class' => 'text-left max-w-4xl lg:pl-24 mx-auto lg:mx-0',
                        ])

                        <section
                            x-intersect:enter="activeSection = '{{ Illuminate\Support\Str::of($layout->title)->kebab() }}'">
                        @else
                            @include('flexible.' . $layout->name(), [
                                'layout' => $layout,
                                'class' => 'text-left max-w-4xl lg:pl-24 mx-auto lg:mx-0',
                            ])
                    @endif

                    @if ($layout->name() === 'section' && $loop->last)
                        </section>
                    @endif
                @endforeach

            </div>
        </div>
    </div>

    @include('flexible.newsletter', ['background' => 'bg-pink'])
@endsection
