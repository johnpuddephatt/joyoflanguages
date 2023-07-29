@if ($layout->courses)
    <div class="py-48">
        <div x-data class="container flex flex-row gap-8">
            @foreach ($layout->courses as $course)
                @if ($course instanceof stdClass)
                    @php($course = $course->attributes)
                @endif

                <div>

                    <h2>{{ $course->number }}</h2>
                    <h2>{{ $course->title }}</h2>
                    <p>{{ $course->description }}</p>

                    <x-button @click="$refs.modal_course_{{ $course->number }}.showModal()">View details</x-button>
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
    </div>
@endif
