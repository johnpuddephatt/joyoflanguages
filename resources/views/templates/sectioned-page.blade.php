@section('image', $page->image?->getUrl('thumbnail'))
@section('title', $page->title)
@extends('layouts.default') @section('content')

    @foreach ($page->content as $key => $layout)
        @break($layout->name() === 'section')
        @include('flexible.' . $layout->name(), ['layout' => $layout])
        @php $page->content->forget($key) @endphp
    @endforeach

    <div>

        <div x-data="{ sectionMenuOpen: false, activeSection: null }" class="flex flex-col lg:flex-row">
            <div :class="{ 'sticky': !sectionMenuOpen }"
                class="top-0 flex flex-col justify-end bg-yellow transition lg:container lg:w-[30%] lg:py-6">

                <div class="lg:sticky lg:bottom-4 lg:max-w-xl">

                    <nav :class="{
                        'translate-y-0': sectionMenuOpen,
                        'translate-y-full': !
                            sectionMenuOpen
                    }"
                        class="fixed inset-0 z-[999] flex flex-col justify-center bg-teal text-center transition lg:static lg:block lg:translate-y-0 lg:bg-transparent lg:text-left">

                        <button class="lg:hidden" @click="sectionMenuOpen = false">
                            @svg('plus', 'mb-8 rotate-45 w-6 h-6 mx-auto')
                        </button>

                        @foreach ($page->content->filter(fn($layout) => $layout->name() === 'section') as $layout)
                            <a x-data="{ section: '{{ Str::of($layout->title)->kebab }}' }" @click="sectionMenuOpen = false; activeSection = section"
                                class="block text-3xl" :href="`#${section}`"
                                :class="{ 'text-teal font-bold': activeSection == section }">{{ $layout->title }}</a>
                        @endforeach

                    </nav>
                </div>
            </div>

            <div class="flex-grow">

                @foreach ($page->content as $layout)
                    @if ($layout->name() === 'section' && !$loop->first)
                        </section>
                    @endif

                    @if ($layout->name() === 'section')
                        <section
                            x-intersect:enter="activeSection = '{{ Illuminate\Support\Str::of($layout->title)->kebab() }}'">
                    @endif

                    @include('flexible.' . $layout->name(), [
                        'layout' => $layout,
                        'class' => 'max-w-4xl lg:pl-24',
                    ])

                    @if ($layout->name() === 'section' && $loop->last)
                        </section>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
@endsection
