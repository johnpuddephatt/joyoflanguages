    <div class="relative pt-12 lg:pt-16">
        <div class="{{ $class ?? 'max-w-4xl' }} container">
            <div class="relative flex max-w-[65ch] flex-col gap-4 lg:flex-row lg:items-center lg:gap-8">
                <img src="{{ Storage::disk('public')->url($layout->image) }}"
                    class="flex-0 block w-40 max-w-none object-cover" />
                <div class="w-full">
                    @if ($layout->title)
                        <h2 class="mb-0 mt-0 text-xl font-bold lg:text-2xl">{{ $layout->title }}</h2>
                    @endif
                    <div class="prose mt-4">
                        @markdown($layout->main)
                    </div>
                </div>

            </div>
        </div>
    </div>
