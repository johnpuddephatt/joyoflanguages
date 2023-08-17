@section('image', $podcast->image?->getUrl('thumbnail'))
@section('title', $podcast->title)
@extends('layouts.default', ['language' => $podcast->language, 'theme' => null]) @section('content')

    <div class="container mx-auto">
        <div class="flex flex-col items-end gap-8 pb-16 pt-40 lg:flex-row">
            <div class="">
                <div class="mb-4 text-lg">

                    @foreach ($podcast->tags as $tag)
                        <a
                            href="{{ \App\Models\Page::getTemplateUrl('App\Nova\Templates\PodcastsPageTemplate') }}?tags={{ $tag->slug }}">#{{ $tag->name }}</a>
                    @endforeach
                </div>
                <h1 class="max-w-5xl text-4xl font-bold !tracking-normal lg:text-5xl 2xl:text-6xl">
                    {!! nl2br($podcast->title) !!}</h1>
                <div>
                    <p class="mt-4 text-lg text-gray lg:mt-6">{{ $podcast->published_at->format('jS F Y') }}
                    </p>
                    <p
                        class="max-whttps://joyoflanguages.test/podcasts%20?tags=wow-xl mt-12 text-xl font-semibold text-gray lg:mt-16">
                        {{ $podcast->introduction }}
                    </p>
                    @if ($podcast->author)
                        <a href="{{ route('user.show', ['user' => $podcast->author->slug]) }}"
                            class="mt-6 flex flex-row items-center gap-4">
                            @if ($podcast->author->photo)
                                <div class="h-16 w-16 overflow-hidden rounded-full">
                                    <img class="-ml-5 -mt-1.5 h-auto w-28 max-w-none"
                                        src="{{ $podcast->author->photo->getUrl('portrait') }}">
                                </div>
                            @endif
                            <div class="flex flex-row leading-tight">
                                <h3>Written by:&nbsp;</h3>
                                <p>{{ $podcast->author->name }} @if ($podcast->author->role)
                                        , {{ $podcast->author->role }}
                                    @endif
                                </p>
                            </div>
                        </a>
                    @endif
                </div>
            </div>

            <div class="mx-auto w-full max-w-xs rounded-3xl bg-blue text-center" x-data="{ playing: false, initialised: false, sliderActive: false, progress: 0 }"
                x-effect=" playing && !initialised ? visualiser() : null; playing == true ? ($refs.player.play(), initialised = true) : $refs.player.pause()">
                <div class="p-6 pb-12">

                    <div class="relative">
                        @if ($podcast->episode_number)
                            <div
                                class="absolute left-0 top-0 z-10 flex h-16 w-16 flex-row items-center justify-center rounded-full bg-yellow p-1 text-center font-bold leading-none">
                                No.{{ $podcast->episode_number }}</div>
                        @endif

                        <x-image-mask class="mb-3 block h-auto w-full">
                            <x-library-image conversion="square" :image="\App\Models\Page::firstWhere(
                                'template',
                                'App\Nova\Templates\PodcastsPageTemplate',
                            )->image" class="relative block h-auto w-full" />
                        </x-image-mask>

                    </div>
                    <p class="mb-1 text-xl font-semibold">Listen to the episode:</p>
                    <p class="mx-auto max-w-xs text-xl font-bold leading-none text-white">{{ $podcast->title }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-6 pt-0">
                    <audio id="player" x-ref="player" class="mt-12 w-full max-w-2xl" @ended="playing = false"
                        @timeupdate="!sliderActive ? (progress = $el.currentTime / $el.duration * 100) : null">
                        <source src="/podcast/{{ $podcast->slug }}/audio" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <button @click="playing = !playing" class="">

                        <svg class="group -mt-8 h-16 w-16" xmlns="http://www.w3.org/2000/svg" width="116.01" height="118.35"
                            viewBox="0 0 116.01 118.35">

                            <circle cx="56.19" cy="56.19" r="54.21" fill="#fff" opacity=".6"
                                class="translate-x-1.5 translate-y-1.5 transition group-hover:translate-x-1 group-hover:translate-y-1 group-active:translate-x-0 group-active:translate-y-0" />
                            <circle cx="56.19" cy="56.19" r="54.21" fill="none" stroke="#12171e"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="3.97" />
                            <path x-show="!playing" fill="#fff" stroke="#12171e" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="3.97"
                                d="M83.46 49.89a6.6 6.6 0 0 1 0 10.74L64.13 73.18 44.8 85.74c-3.68 2.39-8.28-.6-8.28-5.37V30.15c0-4.77 4.6-7.76 8.28-5.37l19.33 12.55Z" />
                            <g x-show="playing" fill="#fff" stroke="#12171e" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="3.97">
                                <rect width="11.01" height="63.97" x="37.53" y="23.28" rx="5.51" />
                                <rect width="11.01" height="63.97" x="63.29" y="23.28" rx="5.51" />
                            </g>
                        </svg>

                    </button>

                    <div class="-mt-6 h-24 w-full">
                        <canvas x-show="playing" class="block h-full w-full opacity-80" id="canvas"
                            x-ref="visualiser"></canvas>

                        <svg x-show="!playing" class="block h-full w-full" xmlns="http://www.w3.org/2000/svg" width="390.01"
                            height="85.49" viewBox="0 0 390.01 85.49">

                            <g opacity=".8" fill="#fff">
                                <rect width="8.1" height="109.49" rx="3.62" />
                                <rect width="8.1" height="73.57" x="9.77" y="35.91" />
                                <rect width="8.1" height="37.66" x="19.54" y="71.82" rx="2.59" />
                                <rect width="8.1" height="57.81" x="29.31" y="51.68" rx="3.21" />
                                <rect width="8.1" height="65.69" x="39.07" y="43.79" rx="3.42" />
                                <rect width="8.1" height="74.45" x="48.84" y="35.04" rx="3.64" />
                                <rect width="8.1" height="42.04" x="58.61" y="67.44" rx="2.74" />
                                <rect width="8.1" height="70.95" x="68.38" y="38.54" rx="3.56" />
                                <rect width="8.1" height="28.9" x="78.15" y="80.58" rx="2.27" />
                                <rect width="8.1" height="35.91" x="87.92" y="73.57" rx="2.53" />
                                <rect width="8.1" height="109.49" x="98" rx="4.05" />
                                <rect width="8.1" height="73.57" x="107.76" y="35.91" rx="3.62" />
                                <rect width="8.1" height="37.66" x="117.53" y="71.82" rx="2.59" />
                                <rect width="8.1" height="57.81" x="127.3" y="51.68" rx="3.21" />
                                <rect width="8.1" height="65.69" x="137.07" y="43.79" rx="3.42" />
                                <rect width="8.1" height="74.45" x="146.84" y="35.04" rx="3.64" />
                                <rect width="8.1" height="42.04" x="156.61" y="67.44" rx="2.74" />
                                <rect width="8.1" height="70.95" x="166.38" y="38.54" rx="3.56" />
                                <rect width="8.1" height="28.9" x="176.14" y="80.58" rx="2.27" />
                                <rect width="8.1" height="35.91" x="185.91" y="73.57" rx="2.53" />
                                <rect width="8.1" height="109.49" x="2028.83" y="1184.71" rx="4.05"
                                    transform="rotate(-180 1209.42 647.095)" />
                                <rect width="8.1" height="73.57" x="2019.06" y="1220.62" rx="3.62"
                                    transform="rotate(-180 1199.65 665.05)" />
                                <rect width="8.1" height="37.66" x="2009.29" y="1256.53" rx="2.59"
                                    transform="rotate(-180 1189.885 683.005)" />
                                <rect width="8.1" height="57.81" x="1999.53" y="1236.38" rx="3.21"
                                    transform="rotate(-180 1180.115 672.935)" />
                                <rect width="8.1" height="65.69" x="1989.76" y="1228.5" rx="3.42"
                                    transform="rotate(-180 1170.345 668.99)" />
                                <rect width="8.1" height="74.45" x="1979.99" y="1219.74" rx="3.64"
                                    transform="rotate(-180 1160.575 664.615)" />
                                <rect width="8.1" height="42.04" x="1970.22" y="1252.15" rx="2.74"
                                    transform="rotate(-180 1150.81 680.815)" />
                                <rect width="8.1" height="70.95" x="1960.45" y="1223.24" rx="3.56"
                                    transform="rotate(-180 1141.04 666.365)" />
                                <rect width="8.1" height="28.9" x="1950.68" y="1265.29" rx="2.27"
                                    transform="rotate(-180 1131.27 687.385)" />
                                <rect width="8.1" height="35.91" x="1940.91" y="1258.28" rx="2.53"
                                    transform="rotate(-180 1121.5 683.885)" />
                                <rect width="8.1" height="109.49" x="1930.84" y="1184.71" rx="4.05"
                                    transform="rotate(-180 1111.425 647.095)" />
                                <rect width="8.1" height="73.57" x="1921.07" y="1220.62" rx="3.62"
                                    transform="rotate(-180 1101.655 665.05)" />
                                <rect width="8.1" height="37.66" x="1911.3" y="1256.53" rx="2.59"
                                    transform="rotate(-180 1091.89 683.005)" />
                                <rect width="8.1" height="57.81" x="1901.53" y="1236.38" rx="3.21"
                                    transform="rotate(-180 1082.12 672.935)" />
                                <rect width="8.1" height="65.69" x="1891.76" y="1228.5" rx="3.42"
                                    transform="rotate(-180 1072.35 668.99)" />
                                <rect width="8.1" height="74.45" x="1881.99" y="1219.74" rx="3.64"
                                    transform="rotate(-180 1062.58 664.615)" />
                                <rect width="8.1" height="42.04" x="1872.22" y="1252.15" rx="2.74"
                                    transform="rotate(-180 1052.815 680.815)" />
                                <rect width="8.1" height="70.95" x="1862.46" y="1223.24" rx="3.56"
                                    transform="rotate(-180 1043.045 666.365)" />
                                <rect width="8.1" height="28.9" x="1852.69" y="1265.29" rx="2.27"
                                    transform="rotate(-180 1033.275 687.385)" />
                                <rect width="8.1" height="53.43" x="1842.92" y="1240.76" rx="3.09"
                                    transform="rotate(-180 1023.505 675.125)" />
                            </g>
                        </svg>

                    </div>
                    <input class="block w-full accent-white opacity-80" type="range" :value="progress"
                        min="0" max="100" step="1"
                        @change="$refs.player.currentTime = $refs.player.duration * $el.value / 100"
                        @mousedown="sliderActive = true" @mouseup="sliderActive = false">

                    <x-button-link class="mt-4 shadow-yellow">Subscribe</x-button-link>
                </div>
            </div>

        </div>

        <script>
            let visualiser = function() {

                const audioCtx = new(window.AudioContext || window.webkitAudioContext)(); // for safari browser

                const canvas = document.getElementById("canvas");

                const ctx = canvas.getContext("2d");

                let audioSource = null;
                let analyser = null;

                audioSource = audioCtx.createMediaElementSource(document.getElementById(
                    'player')); // creates an audio node from the audio source
                analyser = audioCtx
                    .createAnalyser(); // creates an audio node for analysing the audio data for time and frequency
                audioSource.connect(
                    analyser
                ); // connects the audio source to the analyser. Now this analyser can explore and analyse the audio data for time and frequency
                analyser.connect(audioCtx
                    .destination); // connects the analyser to the destination. This is the speakers
                analyser.fftSize =
                    128; // controls the size of the FFT. The FFT is a fast fourier transform. Basically the number of sound samples. Will be used to draw bars in the canvas
                const bufferLength = analyser
                    .frequencyBinCount; // the number of data values that dictate the number of bars in the canvas. Always exactly one half of the fft size
                const dataArray = new Uint8Array(
                    bufferLength); // coverting to unsigned 8-bit integer array format because that's the format we need

                const barWidth = canvas.width / ((bufferLength - 24) * 1.25); // the width of each bar in the canvas

                let x = 0; // used to draw the bars one after another. This will get increased by the width of one bar

                function animate() {
                    x = 0;
                    ctx.clearRect(0, 0, canvas.width, canvas.height); // clears the canvas
                    analyser.getByteFrequencyData(
                        dataArray
                    ); // copies the frequency data into the dataArray in place. Each item contains a number between 0 and 255
                    drawVisualizer({
                        bufferLength,
                        dataArray,
                        barWidth
                    });
                    requestAnimationFrame(animate); // calls the animate function again. This method is built in
                }

                const drawVisualizer = ({
                    bufferLength,
                    dataArray,
                    barWidth
                }) => {
                    let barHeight;
                    for (let i = 0; i < bufferLength; i++) {
                        barHeight = dataArray[
                                i
                            ] / 255 * canvas
                            .height; // the height of the bar is the dataArray value. Larger sounds will have a higher value and produce a taller bar
                        ctx.beginPath();

                        ctx.fillStyle = '#ffffff';
                        ctx.roundRect(
                            canvas.width -
                            x, // this will start the bars at the center of the canvas and move from right to left
                            canvas.height - barHeight,
                            barWidth,
                            barHeight,
                            10

                        ); // draws the bar. the reason we're calculating Y weird here is because the canvas starts at the top left corner. So we need to start at the bottom left corner and draw the bars from there
                        ctx.fill()
                        x += barWidth * 1.25; // increases the x value by the width of the bar
                    }

                    // for (let i = 0; i < bufferLength; i++) {
                    //     barHeight = dataArray[
                    //         i
                    //     ]; // the height of the bar is the dataArray value. Larger sounds will have a higher value and produce a taller bar
                    //     const red = (i * barHeight) / 10;
                    //     const green = i * 4;
                    //     const blue = barHeight / 4 - 12;
                    //     ctx.fillStyle = `rgb(${red}, ${green}, ${blue})`;
                    //     ctx.fillRect(x, canvas.height - barHeight, barWidth,
                    //         barHeight); // this will continue moving from left to right
                    //     x += barWidth; // increases the x value by the width of the bar
                    // }
                };

                animate();
            };
        </script>

        @svg('squiggle', 'mb-8 h-auto w-64')

    </div>

    @if (count(
            \Illuminate\Support\Arr::where($podcast->content ?? [], function ($value) {
                return $value;
            }) ?? []))
        <article x-data="{ tab: '{{ array_key_first($podcast->content) }}' }" x-init="tab = window.location.hash ? window.location.hash.substr(1) : '{{ array_key_first($podcast->content) }}'" class="container mx-auto overflow-hidden pb-24">
            <div class="prose prose-lg prose-gray">
                @if (count(
                        \Illuminate\Support\Arr::where($podcast->content, function ($value) {
                            return $value;
                        })) > 1)

                    <div class="flex flex-col items-center gap-4 lg:float-right lg:w-[calc(100%-42rem-4rem)] lg:px-4">
                        @foreach ($podcast->content as $tabName => $tab)
                            @if ($tab)
                                <button
                                    @click="tab = '{{ $tabName }}'; window.location.hash = '{{ $tabName }}'"
                                    :class="{ 'bg-yellow': tab == '{{ $tabName }}' }"
                                    class="w-full max-w-[16rem] rounded-full border-4 px-6 py-2 text-left text-xl font-bold">{{ Str::of($tabName)->replace('_', ' ')->ucfirst() }}</button>
                            @endif
                        @endforeach
                    </div>
            </div>
    @endif

    @foreach ($podcast->content as $tabName => $tab)
        @if ($tab)
            <div x-show="tab == '{{ $tabName }}'" x-transition id="{{ $tabName }}">

                @foreach ($tab as $block)
                    @includeIf('blocks.' . $block['type'], [
                        ...$block,
                        'class' => match ($block['attrs']['blockWidth'] ?? 'normal') {
                            'normal' => 'max-w-2xl',
                            'wide' => 'max-w-4xl mx-auto clear-both',
                            'full' => 'left-1/2 relative -translate-x-1/2 w-screen max-w-none w-full clear-both',
                            'sidebar' => 'lg:px-4 lg:float-right lg:w-[calc(100%-42rem-4rem)]',
                        },
                    ])
                @endforeach
            </div>
        @endif
    @endforeach

    </article>
@else
    <article class="container mx-auto pb-24 pt-8">
        <div class="prose prose-lg prose-gray">
            {!! $podcast->rss_content !!}
        </div>
    </article>
    @endif

@endsection
