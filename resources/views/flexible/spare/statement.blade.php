@if ($layout->statement)
    <div class="lg:py-42 relative flex flex-col justify-center overflow-hidden bg-gray py-36" x-data="{ current: 1 }"
        x-init="setInterval(() => {++current }, 1500)">
        <div class="container relative z-10 text-5xl font-bold lg:text-6xl xl:text-8xl">
            @foreach (explode(PHP_EOL, $layout->statement) as $line)
                <p class="transition-all duration-700"
                    :class="{ 'text-red': !((current % {{ $loop->count }}) - {{ $loop->index }}) }">
                    {{ $line }}
                </p>
            @endforeach
        </div>
        @if (isset($settings['logo']))
            <img class="absolute -top-8 -right-36 w-[50em] opacity-80"
                src="{{ Storage::disk('local')->url($settings['logo']) }}">
        @endif
        <div class="absolute bottom-0 left-0 right-0 h-48 w-full bg-gradient-to-t from-white to-transparent lg:hidden">
        </div>
    </div>
@endif
