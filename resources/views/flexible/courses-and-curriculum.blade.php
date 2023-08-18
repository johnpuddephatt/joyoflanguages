@if ($layout->courses)
    <div class="pb-16 pt-32">
        @include('components.block-intro', ['layout' => $layout])

        <div class="container mx-auto flex flex-col items-center gap-16 py-16 lg:flex-row">
            <div class="prose flex-1 lg:prose-lg lg:w-1/2">
                <div class="max-w-lg">
                    @markdown($layout->introduction)</div>
            </div>
            <img src="{{ Storage::disk('public')->url($layout->image) }}" class="mx-auto block w-full flex-1 lg:w-1/2" />
        </div>

        <div class="container mx-auto">

            <x-swiper :mobile_view_count="1.25" :item_count="count($layout->courses)" centered_slides="true">

                @foreach ($layout->courses as $course)
                    @if ($course instanceof stdClass)
                        @php($course = $course->attributes)
                    @endif

                    <div @click="$refs.modal_course_{{ $course->number }}.showModal()"
                        class="swiper-slide !duration-250 group flex cursor-pointer flex-col items-start border p-6 !transition hover:border-black hover:bg-beige hover:bg-opacity-20 hover:opacity-40 lg:w-1/4 lg:border-transparent lg:p-4"
                        x-data="{ modalOpen: false, shown: false }"
                        :class="{ 'flex-1': !swiper, 'max-lg:opacity-20': !shown, '!opacity-100': shown }"
                        x-intersect:enter.half="shown = true" x-intersect:leave.half="shown = false">

                        <svg xmlns="http://www.w3.org/2000/svg" width="43.78" height="40.29" class="mb-2 h-14 w-14"
                            viewBox="0 0 43.78 40.29">
                            <path fill="#eee5df"
                                d="M6.67 29.44c.12.33.24.66.35 1 2.18 6.41 19 14.34 28.1 6.79 5.3-4.42 9.27-7.61 8.59-16.64A18 18 0 0 0 28.26 5.08S13.01 1.62 6.54 14.85c-2.84 5.8-.63 12.61.13 14.59Z" />
                            <circle cx="19.08" cy="19.08" r="18.19" fill="none" stroke="#151616"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.77" />
                            <circle cx="19.08" cy="19.08" r="{{ 1 + 3 * $course->number }} " fill="#ffca00"
                                stroke="#151616" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.77" />
                        </svg>

                        {{-- <div class="font-semibold">Level {{ $course->number }}:</div> --}}
                        <h2 class="mb-2 text-lg font-bold">{{ $course->title }}</h2>
                        <p class="prose mb-6">{{ $course->description }}</p>

                        <x-button class="mt-auto !w-auto !px-4 !py-1.5 !text-sm"
                            @click.stop="$refs.modal_course_{{ $course->number }}.showModal()">View
                            curriculum</x-button>

                        <dialog
                            class="z-50 w-full max-w-xl overscroll-contain rounded-3xl border-[3px] border-black backdrop:overscroll-contain backdrop:bg-blue backdrop:bg-opacity-50 backdrop:backdrop-blur-md"
                            x-ref="modal_course_{{ $course->number }}">
                            <form method="dialog">
                                <button
                                    class="absolute right-4 top-4 block w-10 rounded-full before:fixed before:inset-0 before:-z-10 before:overscroll-contain before:bg-white before:bg-opacity-50"
                                    @click="$refs.modal_course_{{ $course->number }}.close()"
                                    aria-label="Close modal window">@svg('plus', ' rotate-45 rounded-full border-[3px] p-2  w-10 h-10')</button>
                                <div>
                                    <div class="bg-beige bg-opacity-50 p-8 pb-4 pr-16">
                                        {{-- <h2>{{ $course->number }}</h2> --}}
                                        <h2 class="mb-2 text-2xl font-bold !leading-none">{{ $course->title }}
                                            curriculum</h2>

                                        <p class="type-subtitle">{{ $course->description }}</p>
                                    </div>

                                    <div class="">
                                        @if ($course->modules && count($course->modules))
                                            <div x-data="{ tab: 0 }" class="prose prose-gray overflow-hidden">
                                                <div
                                                    class="flex flex-row items-center gap-3 border-b-[3px] border-gray bg-beige bg-opacity-50 px-8 pb-4">
                                                    @foreach ($course->modules as $key => $module)
                                                        @if ($module instanceof stdClass)
                                                            @php($module = $module->attributes)
                                                        @endif

                                                        <button @click.prevent="tab = {{ $key }}"
                                                            :class="{ '!bg-yellow': tab == {{ $key }} }"
                                                            class="rounded-full border-[3px] bg-white px-6 py-1.5 text-left font-semibold">
                                                            Module {{ $module->title }}</button>
                                                    @endforeach
                                                </div>

                                                @foreach ($course->modules as $key => $module)
                                                    @if ($module instanceof stdClass)
                                                        @php($module = $module->attributes)
                                                    @endif
                                                    <div class="max-h-[24rem] overflow-y-auto p-8 pt-0"
                                                        x-show="tab == {{ $key }}">
                                                        <h3 class="text-xl font-bold text-blue">Module
                                                            {{ $module->title }}
                                                        </h3>
                                                        <div>@markdown($module->description)</div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        @endif

                                        <div>

                                        </div>
                            </form>
                        </dialog>
                    </div>
                @endforeach
            </x-swiper>

            @if ($layout->outro)
                <x-hint>
                    @markdown($layout->outro)

                    <svg xmlns="http://www.w3.org/2000/svg" width="40.76" height="43.06"
                        class="absolute right-0 top-0 h-auto w-16 -translate-y-1/3 lg:translate-x-1/3"
                        viewBox="0 0 40.76 43.06">
                        <path fill="#fff"
                            d="M1.54 32.2c.12.33.24.66.35 1 2.18 6.41 19 14.34 28.1 6.79 5.3-4.42 9.27-7.6 8.59-16.64A18 18 0 0 0 23.13 7.84S7.88 4.38 1.41 17.61c-2.84 5.81-.63 12.61.13 14.59Z" />
                        <circle cx="21.68" cy="19.08" r="18.19" fill="none" stroke="#151616"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.77" />
                        <path fill="none" stroke="#151616" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.45"
                            d="M19.15 20.92v-1.24c0-2.48 4.08-3.57 4.08-5.46a2 2 0 0 0-2.22-1.75c-2.07 0-2.63 1.86-3.37 1.21l-1.8-1.77a.52.52 0 0 1 0-.77 8.28 8.28 0 0 1 6-2.6c3.13 0 6 2.19 6 5.17 0 3.9-4.44 4-4.44 7.21a.55.55 0 0 1-.56.56h-3.16a.56.56 0 0 1-.53-.56Zm2.13 3.28a2.81 2.81 0 1 1 0 5.62 2.81 2.81 0 0 1 0-5.62Z" />
                    </svg>

                </x-hint>
            @endif
        </div>
    </div>
@endif
