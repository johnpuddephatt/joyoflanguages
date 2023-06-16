<div class="relative bg-beige bg-opacity-30">
    <div class="{{ $class ?? null }} container max-w-7xl gap-x-24 py-8 md:grid md:grid-cols-2 lg:py-32">
        <div class="">
            <h2 class="mb-8 text-4xl font-bold">{!! $layout->title !!}</h2>
            <div class="prose:emphasise-first prose max-w-lg">
                {!! $layout->description !!}
            </div>
        </div>
        @if (count($layout->bullets))
            <div class="space-y-6 max-lg:mt-12">
                @foreach ($layout->bullets as $bullet)
                    <div class="flex flex-row items-center gap-2 font-bold">
                        <div
                            class="relative h-8 w-8 rounded-full border-2 after:absolute after:inset-0 after:-z-10 after:translate-x-0.5 after:translate-y-0.5 after:rounded-full after:bg-yellow">
                        </div>
                        <p>{{ $bullet }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
