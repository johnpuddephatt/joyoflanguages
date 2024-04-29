<div id="{{ $layout ? $layout->key() : null }}"
    class="{{ $layout->background_colour ?? '' }} {{ $layout->images ? 'pb-12 2xl:pb-20' : 'pb-8 2xl:pb-16' }} relative overflow-hidden pt-8 lg:pt-8">

    <div class="{{ $class ?? 'mx-auto' }} container max-w-6xl">
        <div
            class="{{ $layout->colour ?? 'bg-teal-light' }} {{ $layout->images ? ' pb-16 md:pb-24 lg:pb-48' : null }} relative flex flex-col-reverse items-center gap-2 rounded-3xl px-4 py-12 md:p-8 lg:flex-row lg:gap-4 lg:px-12 lg:py-16 xl:gap-8">
            @if ($layout->squiggle == 1)
                <svg xmlns="http://www.w3.org/2000/svg" width="315.85" height="124.74"
                    class="absolute -left-72 -top-4 h-auto w-96 lg:top-4" viewBox="0 0 315.85 124.74">
                    <path fill="none" stroke="#ffce00" stroke-linecap="round" stroke-miterlimit="10"
                        stroke-width="3.84"
                        d="M313.94 21.42c-27.07 20-30.39-22.14-47.82-17.05-12.12 3.54-19 15.94-25.2 26.91s-15.11 22.74-27.73 23.27c-16.63.71-26.43-17.53-38.06-29.44-24.43-25-57.23-35.25-70-2.72-8 20.32-1.46 30.54 5.88 64.7 0 0 15.93 62.77-54.75 21.89-17.07-9.65-13.56-35-1.05-27.45s-35.95 42-53.3 1" />
                </svg>
            @endif
            <div x-data="{
                currentLevel: 'Elementary',
                levels: [{ 'name': 'Elementary', color: 'bg-yellow fill-yellow', text: 'text-black', student: 'Rick', video: 409666923, teacher: 'Katie', feedback_video: 409662749 }, { 'name': 'Intermediate', text: 'text-white', color: 'bg-light-teal fill-light-teal', student: 'Claire', video: 481288448, teacher: 'Blessy', feedback_video: 481288528 }, { 'name': 'Advanced', color: 'bg-blue fill-blue', text: 'text-white', student: 'Madelyn', video: 409662683, teacher: 'Stefano', feedback_video: 409662831 }],
            }"
                class="relative flex flex-col self-stretch py-4 md:py-12 lg:mx-auto lg:w-[55%]">

                <h3 class="type-md text-teal relative z-10 mt-2 text-center font-bold md:pb-4 xl:pb-0">See
                    it
                    in
                    action!</h3>
                <svg class="absolute left-1/2 top-1/2 z-0 block h-auto w-[16rem] -translate-x-1/2 translate-y-[-50%] opacity-20"
                    xmlns="http://www.w3.org/2000/svg" width="62.93" height="57.46" viewBox="0 0 62.93 57.46">
                    <path class="fill-light-teal"
                        d="M4.98 44.73c.28.49.56 1 .82 1.48 5.2 9.68 34.27 17.87 46.74 3.4 7.3-8.48 12.81-14.63 9.31-28.89C60.2 13.98 51.64-.11 33.03.02c0 0-25.31-1.48-32.13 21.4-3 10.05 2.34 20.34 4.08 23.31Z">
                    </path>
                </svg>
                <template x-for="level in levels">
                    <div x-show="currentLevel == level.name" class="mt-0 flex flex-col md:flex-row md:gap-3">
                        <div class="relative w-5/6 md:w-1/2">
                            <div
                                class="absolute -right-16 -top-2 z-10 flex h-20 w-20 -rotate-6 items-center justify-center rounded-full p-2 text-center text-sm font-bold !leading-none md:-left-2 md:-top-8 lg:-left-4 lg:-top-16 lg:h-24 lg:w-24 lg:p-4 lg:text-base xl:left-1">

                                <svg class="absolute inset-0 -z-10 h-full w-full max-w-none"
                                    xmlns="http://www.w3.org/2000/svg" width="62.93" height="57.46"
                                    viewBox="0 0 62.93 57.46">
                                    <path :class="level.color"
                                        d="M4.98 44.73c.28.49.56 1 .82 1.48 5.2 9.68 34.27 17.87 46.74 3.4 7.3-8.48 12.81-14.63 9.31-28.89C60.2 13.98 51.64-.11 33.03.02c0 0-25.31-1.48-32.13 21.4-3 10.05 2.34 20.34 4.08 23.31Z">
                                    </path>
                                </svg>
                                <span :class="level.text">
                                    <span x-text="level.student"></span>’s video</span>

                            </div>
                            <div class="relative aspect-[8/5]">
                                <iframe disableRemotePlayback
                                    class="absolute inset-0 h-full w-full rounded-md border-4 border-black bg-black"
                                    :src="`https://player.vimeo.com/video/${level.video}?wmode=opaque&pip=false&chromecast=false&speed=false&quality=540p`"
                                    frameborder="0" allow="autoplay" width="100%" height="100%"></iframe>
                            </div>
                        </div>
                        <div class="relative ml-auto mt-6 w-5/6 md:ml-0 md:mt-12 md:w-1/2">
                            <div
                                class="absolute -left-16 -top-4 z-10 flex h-20 w-20 rotate-6 items-center justify-center rounded-full p-1 text-center text-sm font-bold !leading-none md:-right-2 md:left-auto lg:-right-4 lg:-top-16 lg:h-24 lg:w-24 lg:p-4 lg:text-base">

                                <svg class="absolute inset-0 -z-10 h-full w-full max-w-none"
                                    xmlns="http://www.w3.org/2000/svg" width="62.93" height="57.46"
                                    viewBox="0 0 62.93 57.46">
                                    <path :class="level.color"
                                        d="M4.98 44.73c.28.49.56 1 .82 1.48 5.2 9.68 34.27 17.87 46.74 3.4 7.3-8.48 12.81-14.63 9.31-28.89C60.2 13.98 51.64-.11 33.03.02c0 0-25.31-1.48-32.13 21.4-3 10.05 2.34 20.34 4.08 23.31Z">
                                    </path>
                                </svg>
                                <span :class="level.text">Feedback from
                                    <span x-text="level.teacher"></span></span>

                            </div>
                            <div class="relative aspect-[8/5]">
                                <iframe disableRemotePlayback
                                    class="absolute inset-0 h-full w-full rounded-md border-4 border-black bg-black"
                                    :src="`https://player.vimeo.com/video/${level.feedback_video}?wmode=opaque&pip=false&chromecast=false&speed=false&quality=540p`"
                                    frameborder="0" allow="autoplay" width="100%" height="100%"></iframe>
                            </div>
                        </div>
                    </div>
                </template>
                <div class="relative z-10 -mb-4 mt-8 flex flex-row justify-center gap-1 md:gap-2">
                    <template x-for="level in levels">
                        <button
                            :class="`${level.color} ${level.name !== currentLevel ? 'bg-opacity-0 hover:bg-opacity-30' : 'hover:bg-opacity-100'} transition rounded-full border-[3px] px-2 py-1.5 text-left max-md:text-sm font-semibold hover:bg-opacity-30 lg:px-6`"
                            x-text="level.name" @click="currentLevel = level.name"></button>
                    </template>

                </div>

            </div>

            <div class="{{ $layout->reverse ? 'lg:order-first' : null }} relative z-10 flex-1 2xl:py-10">
                <h2 class="type-lg max-w-xl">{!! $layout->title !!}</h2>
                @if ($layout->subtitle)
                    <div class="type-sm mt-4">{{ $layout->subtitle }}</div>
                @endif
                @if ($layout->description)
                    <div class="prose prose-lg mt-4 lg:mt-8 lg:max-w-md">@markdown($layout->description)</div>
                @endif

            </div>

        </div>

    </div>
</div>
