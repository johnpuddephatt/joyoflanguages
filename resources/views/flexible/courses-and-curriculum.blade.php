@if ($layout->courses)
    <div class="py-16">
        @include('components.block-intro', ['layout' => $layout])

        <div class="container mx-auto flex flex-row items-center gap-16 py-16">
            <div class="prose w-1/2 flex-1 lg:prose-lg">
                <div class="max-w-lg">
                    @markdown($layout->introduction)</div>
            </div>
            <img src="{{ $layout->image }}" class="mx-auto block w-1/2 flex-1" />
        </div>

        <div x-data class="container mx-auto flex flex-row gap-8">
            @foreach ($layout->courses as $course)
                @if ($course instanceof stdClass)
                    @php($course = $course->attributes)
                @endif

                <div @click="$refs.modal_course_{{ $course->number }}.showModal()"
                    class="group flex w-1/4 cursor-pointer flex-col rounded-3xl p-4 transition hover:bg-beige hover:bg-opacity-20">

                    <div
                        class="relative mb-2 flex h-12 w-12 flex-col items-center justify-center rounded-full border-2 border-black text-2xl font-bold transition after:absolute after:-z-10 after:h-full after:w-full after:translate-x-1.5 after:translate-y-1.5 after:rounded-full after:bg-beige after:bg-opacity-50 group-hover:bg-yellow">
                        {{ $course->number }}</div>
                    <div class="font-semibold">Level {{ $course->number }}:</div>
                    <h2 class="mb-2 text-lg font-bold">{{ $course->title }}</h2>
                    <p class="mb-6">{{ $course->description }}</p>

                    <x-button class="mt-auto" @click.stop="$refs.modal_course_{{ $course->number }}.showModal()">View
                        details</x-button>
                </div>

                <dialog
                    class="z-50 w-full max-w-md rounded-3xl border-2 border-black p-8 backdrop:bg-teal backdrop:bg-opacity-20 backdrop:backdrop-blur-md"
                    x-ref="modal_course_{{ $course->number }}">
                    <form method="dialog">
                        <button
                            class="ml-auto block w-10 before:fixed before:inset-0 before:-z-10 before:bg-white before:bg-opacity-50"
                            @click="$refs.modal_course_{{ $course->number }}.close()"
                            aria-label="Close modal window">@svg('plus', ' rotate-45 border-2 p-2 rounded-full w-10 h-10')</button>
                        <div class="flex flex-col gap-4">
                            <h2>{{ $course->number }}</h2>
                            <h2>{{ $course->title }}</h2>
                            <p>{{ $course->description }}</p>

                            <article x-data="{ tab: 0 }" class="prose prose-gray overflow-hidden pb-24">

                                <div class="flex flex-row items-center gap-4">
                                    @foreach ($course->modules as $key => $module)
                                        @if ($module instanceof stdClass)
                                            @php($module = $module->attributes)
                                        @endif

                                        <button @click.prevent="tab = {{ $key }}"
                                            :class="{ 'bg-yellow': tab == {{ $key }} }"
                                            class="w-full max-w-[16rem] rounded-full border-4 px-6 py-2 text-left text-xl font-bold">
                                            {{ $module->title }}</button>
                                    @endforeach
                                </div>

                                @foreach ($course->modules as $key => $module)
                                    @if ($module instanceof stdClass)
                                        @php($module = $module->attributes)
                                    @endif
                                    <div x-show="tab == {{ $key }}">

                                        <h3>{{ $module->title }}</h3>
                                        <div>@markdown($module->description)</div>
                                    </div>
                                @endforeach

                            </article>

                        </div>
                    </form>
                </dialog>
            @endforeach
        </div>
        @if ($layout->outro)
            <div class="prose relative mx-auto mt-16 max-w-3xl rounded-3xl bg-light-teal bg-opacity-20 p-12 px-16">
                @markdown($layout->outro)

            </div>
        @endif
    </div>
@endif
