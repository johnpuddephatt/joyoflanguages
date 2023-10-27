    <div class="relative mb-12 mt-12 lg:mt-16">
        <div class="{{ $class ?? 'max-w-4xl' }} container">
            <div class="relative flex max-w-[65ch] flex-col gap-4 lg:flex-row lg:items-center lg:gap-8">
                <img src="{{ Storage::disk('public')->url($layout->image) }}"
                    class="flex-0 block w-32 max-w-none object-cover lg:w-40" />
                <div class="w-full">
                    @if ($layout->title)
                        <h2 class="type-sm my-0">{{ $layout->title }}</h2>
                    @endif
                    <div class="prose mt-4">
                        @markdown($layout->main)
                    </div>
                </div>

            </div>
        </div>
    </div>
