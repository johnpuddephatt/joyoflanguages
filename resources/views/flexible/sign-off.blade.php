<div class="bg-{{ $layout->colour ?? 'teal-light' }}">
    <div class="{{ $class ?? 'mx-auto max-w-7xl' }} container relative block py-8 md:grid md:grid-cols-2 lg:py-16">

        <x-responsive-image :image="$layout->image" class="w-full max-w-none" />

        <div
            class="{{ $layout->reverse ? 'order-first' : null }} relative z-10 flex flex-col items-start justify-center px-8 py-8">
            <h2 class="mb-8 max-w-lg text-2xl font-bold lg:text-4xl">{!! $layout->title !!}</h2>

        </div>

    </div>
</div>
