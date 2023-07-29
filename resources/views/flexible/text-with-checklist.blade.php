<div class="relative">
    <div class="{{ $class ?? 'mx-auto max-w-7xl' }} container gap-x-24 py-8 md:grid md:grid-cols-2 lg:py-32">
        <div class="">
            <h2 class="mb-8 text-4xl font-bold">{!! $layout->title !!}</h2>
            <div class="prose:emphasise-first prose max-w-lg">
                @markdown($layout->description)
            </div>
            <x-library-image conversion="3x2" :image="$layout->image" />

        </div>
        @if ($layout->checklist)
            <div class="space-y-6 max-lg:mt-12">
                @foreach ($layout->checklist as $checklistItem)
                    <div class="flex flex-row items-center gap-2">
                        <div
                            class="relative h-8 w-8 rounded-full border-2 after:absolute after:inset-0 after:-z-10 after:translate-x-0.5 after:translate-y-0.5 after:rounded-full after:bg-yellow">
                        </div>
                        <div>
                            <h3 class="font-bold">{{ $checklistItem->title }}</h3>
                            @markdown($checklistItem->description)
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
