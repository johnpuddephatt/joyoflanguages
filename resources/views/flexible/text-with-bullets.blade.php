<div class="relative bg-beige bg-opacity-30">
    <div
        class="{{ $class ?? 'mx-auto max-w-7xl' }} container gap-x-12 py-16 md:grid md:grid-cols-2 lg:py-32 2xl:gap-x-24">
        <div class="">
            <h2 class="type-lg">{!! $layout->title !!}</h2>
            <div class="prose-standout prose max-w-lg">
                @markdown($layout->description)
            </div>
        </div>
        @if (count($layout->bullets))
            <div class="space-y-4 max-lg:mt-12 2xl:space-y-6">
                @foreach ($layout->bullets as $bullet)
                    <div class="flex flex-row items-center gap-2">
                        <div
                            class="relative h-8 w-8 flex-none rounded-full border-2 after:absolute after:inset-0 after:-z-10 after:translate-x-0.5 after:translate-y-0.5 after:rounded-full after:bg-yellow">
                        </div>
                        <p class="prose prose-lg">{{ $bullet }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
