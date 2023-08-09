<div class="relative">
    <div class="{{ $class ?? 'mx-auto max-w-7xl' }} container py-8 md:grid md:grid-cols-2 lg:py-32">
        <div class="flex flex-col">
            <h2 class="mb-8 text-4xl font-bold">{!! $layout->title !!}</h2>
            <div class="prose:emphasise-first prose mb-12 max-w-lg">
                @markdown($layout->description)
            </div>
            <x-library-image class="mt-auto block w-full" conversion="3x2" :image="$layout->image" />

        </div>
        @if ($layout->checklist)
            <div class="space-y-6 pl-24 max-lg:mt-12">
                @foreach ($layout->checklist as $checklistItem)
                    <div class="flex flex-row items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-0 h-16 w-16" width="43.29" height="40.16"
                            viewBox="0 0 43.29 40.16">
                            <path fill="#ffce00"
                                d="M6.17 29.31c.13.32.24.65.36 1 2.18 6.42 19 14.34 28.09 6.8 5.31-4.42 9.28-7.61 8.59-16.64A18 18 0 0 0 27.77 4.95S12.52 1.49 6.05 14.73c-2.84 5.79-.64 12.59.12 14.58Z" />
                            <g fill="none" stroke="#151616" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.77px">
                                <circle cx="19.08" cy="19.08" r="18.19" />
                                <path d="m13.84 17.62 5.1 6.52L29.73 9.1" />
                                <path d="M31.54 18.98a12.41 12.41 0 1 1-7.77-11.5" />
                            </g>
                        </svg>

                        <div class="flex-1">
                            <h3 class="font-bold">{{ $checklistItem->title }}</h3>
                            <div class="prose text-sm">@markdown($checklistItem->description)</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
