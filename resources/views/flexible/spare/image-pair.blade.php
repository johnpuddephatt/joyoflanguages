<div
    class="{{ $layout->lift ? 'lg:-mb-48 -mb-32' : null }} {{ $layout->background_colour ? ' lg:pb-24' : null }} relative py-8 lg:py-12">
    @if ($layout->background_colour)
        <div class="bg-{{ $layout->background_colour }} absolute bottom-0 left-0 -z-10 h-48 w-full"></div>
    @endif
    <div class="container grid max-h-screen max-w-5xl gap-4 lg:grid-cols-3">
        <x-library-image conversion="3x2" class="block h-full w-full max-w-none object-cover lg:col-span-2"
            :image="$layout->image" />
        <x-library-image conversion="portrait" class="block h-full w-full max-w-none object-cover" :image="$layout->secondary_image" />
    </div>
</div>
