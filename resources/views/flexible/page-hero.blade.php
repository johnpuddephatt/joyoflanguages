@php
    $embed = isset($layout->video_embed_url) ? OEmbed::get($layout->video_embed_url) : null;
@endphp

<div id="{{ $layout ? $layout->key() : null }}" class="relative">
    <div x-data="{ trailerOpen: false, trailerLoaded: false }"
        class="2xl:container-lg @if ($layout->image) lg:min-h-[80vh] @endif mx-auto flex flex-col-reverse items-center pb-12 pt-20 lg:container lg:flex-row lg:pb-24 xl:pt-40 2xl:pb-36 2xl:pt-48">
        <div class="pt-4 max-lg:container lg:w-1/2">

            @if ($layout->pretitle)
                <div class="type-sm text-light-teal">{{ $layout->pretitle }}</div>
            @endif

            <h1 class="type-xl">
                {!! nl2br($layout->title) !!}
            </h1>
            <div class="type-xs max-w-md lg:max-w-lg">@markdown($layout->description)</div>

            @if ($layout->badge)
                <div>
                    <div class="bg-yellow border-yellow mb-6 mt-4 inline-block rounded-full border-2 bg-opacity-25 px-3">
                        {{ $layout->badge }}</div>
                </div>
            @endif
            @if ($layout->button_url)
                <x-button-link class="shadow-yellow mt-6 text-lg"
                    href="{{ $layout->button_url }}">{{ $layout->button_text ?? 'Read more' }}</x-button-link>
            @endif
        </div>
        <div class="relative w-full lg:w-1/2 lg:pl-8">

            <x-responsive-image conversion="landscape" :image="$layout->image" class="h-auto w-full transition duration-500"
                x-bind:class="{ 'opacity-0 scale-75': trailerOpen }" />

            @if ($embed)
                <div x-cloak x-data="{ player: null }" x-init="window.player = new Vimeo.Player(document.querySelector('#{{ $layout ? $layout->key() : null }}-video'));
                window.player.on('ended', () => {
                    setTimeout(() => {
                        trailerOpen = false;
                        window.player.setCurrentTime(0);
                    }, 3500)
                });
                console.log(window.player);">
                    <button x-on:click="trailerOpen = true; window.player.play()" aria-label="Play video"
                        class="absolute left-1/2 top-1/2 z-20 w-1/4 -translate-x-1/2 -translate-y-1/2 opacity-90 transition hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72.41" height="66.65"
                            class="block h-auto w-full" viewBox="0 0 72.41 66.65">
                            <path fill="#e9abb0"
                                d="M69.21 19.57c-.25-.6-.48-1.21-.7-1.83C64.17 5.82 32.3-8.35 15.65 6.13 5.9 14.61-1.42 20.73.23 37.61c.77 8 8.22 25.49 29.51 28.43 0 0 28.69 5.88 40.27-19.14 5.09-11 .7-23.64-.8-27.33Z" />
                            <circle cx="38.5" cy="37.03" r="27.69" fill="#fff" opacity=".6" />
                            <circle cx="35.64" cy="32.97" r="27.69" fill="none" stroke="#12171e"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2.03" />
                            <path fill="#fff" stroke="#12171e" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2.03"
                                d="M49.56 29.75a3.38 3.38 0 0 1 0 5.49l-9.87 6.41-9.87 6.41c-1.88 1.22-4.23-.3-4.23-2.74V19.67c0-2.44 2.35-4 4.23-2.74l9.87 6.41Z" />
                        </svg>

                    </button>
                    <script src="https://player.vimeo.com/api/player.js"></script>

                    <div x-bind:class="{ 'scale-100 opacity-100': trailerOpen, 'scale-75 opacity-0 pointer-events-none': !trailerOpen }"
                        class="absolute left-1/2 top-1/2 z-30 w-full max-w-5xl -translate-x-1/2 -translate-y-1/2 transition">

                        <div id="{{ $layout ? $layout->key() : null }}-video"class="overflow-hidden md:shadow-black-light relative shadow-2xl"
                            style="padding-top: {{ ($embed->data()['height'] / $embed->data()['width']) * 100 }}%">
                            {!! $embed->html(['class' => 'inset-0 absolute w-full h-full']) !!}
                        </div>
                        <x-button x-on:click="trailerOpen = false; window.player.pause()"
                            class="!absolute left-1/2 top-full mt-2 hidden -translate-x-1/2 !py-1 !pl-2 !pr-4 !text-sm md:block">
                            @svg('plus', 'inline-block rotate  rotate-45 text-black w-4 h-4 rounded-full') <span class="ml-1 inline-block">Close video</span>
                        </x-button>
                    </div>

                </div>
            @endif

            @if ($layout->show_squiggles)
                <svg x-bind:class="{ 'opacity-0': trailerOpen }"
                    class="pointer-events-none absolute -bottom-4 -left-6 -right-4 -top-2 z-50 block h-auto w-[111%] max-w-none transition duration-1000 xl:-left-12"
                    xmlns="http://www.w3.org/2000/svg" width="367.14" height="223.72" viewBox="0 0 367.14 223.72">
                    <path
                        d="M79.88 43.01C33.01 52.67 43.43-1.93 54.98 7.06S14.41 44.58 1.91 1.92M363.53 221.8c-62.33-41.56 29.32-50.25-7.25-85.05"
                        style="fill:none;stroke:#ffce00;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3.84px" />
                </svg>
            @endif

        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
        class="pointer-events-none absolute left-0 right-0 top-[17%] h-auto lg:top-0 lg:-z-10"
        viewBox="0 0 2676.7 1530.2">
        @if ($layout->show_shape_1)
            <path fill="#f4af6b"
                d="M2393 1047.2c-1.9-3.2-3.8-6.4-5.6-9.7-35.5-63.4-228.6-114.3-309.4-17.2-47.3 56.9-83.1 98.2-58.3 192.2 11.7 44.3 69.9 136.5 192.9 133.6 0 0 167.6 6.9 210.1-145.2 18.6-66.8-17.8-134.3-29.7-153.7z" />
        @endif
        @if ($layout->show_shape_2)
            <path class="hidden lg:block" fill="#4dacb7"
                d="M2852.4 158c-.1-5.6-.1-11.2-.1-16.9 1.3-109.2-212-320.3-390.1-254.4-104.3 38.6-181.9 65.6-220 206.5-18 66.5-11.4 230.2 151 318.7 0 0 213 134.6 382.4-31.5 74.5-73 77.7-188.2 76.8-222.4z" />
        @endif
        @if ($layout->show_shape_3)
            <path fill="#ffd703"
                d="M182.1 901.6c-4.1-6.7-8-13.5-11.8-20.4-74.6-133.3-480.8-240.3-650.7-36.1-99.6 119.6-174.7 206.5-122.6 404 24.6 93.2 146.9 287.1 405.7 281 0 0 352.4 14.5 441.8-305.3 39.2-140.5-37.5-282.3-62.4-323.2z" />
        @endif
    </svg>

</div>
