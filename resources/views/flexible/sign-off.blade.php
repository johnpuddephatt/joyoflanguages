<div class="overflow-hidden py-16">
    <div
        class="bg-{{ $layout->colour ?? 'teal-light' }} {{ $class ?? 'mx-auto max-w-7xl' }} container relative mb-24 block py-8 md:grid md:grid-cols-2 lg:py-16">

        <x-responsive-image :image="$layout->image"
            class="{{ $layout->reverse ? '-mr-24' : '-ml-24' }} w-[calc(100%+4rem)] max-w-none" />

        <div
            class="{{ $layout->reverse ? 'order-first' : null }} relative z-10 flex flex-col items-start justify-center py-8 px-8">
            <h2 class="mb-8 max-w-lg text-2xl font-bold lg:text-4xl">{!! $layout->title !!}</h2>

        </div>

    </div>
</div>
