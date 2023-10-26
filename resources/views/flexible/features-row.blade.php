<div class="py-16">
    <div class="mx-auto max-w-2xl text-center">
        @include('components.block-intro', ['layout' => $layout])
    </div>
    <div class="relative pt-12 2xl:pt-16">
        <div class="container mx-auto grid max-w-none gap-4 sm:grid-cols-2 lg:gap-5 xl:grid-cols-4 2xl:gap-6">
            @foreach ($layout->features as $feature)
                <div class="!h-auto cursor-default bg-beige">
                    @if ($feature->image)
                        <x-library-image :image="$feature->image" conversion="3x2" class="mx-auto block w-full" />
                    @endif
                    <div class="px-4 py-6">
                        @if ($feature->title)
                            <h3 class="type-md">
                                {{ $feature->title }}
                            </h3>
                        @endif
                        @if ($feature->description)
                            <p class="prose prose-lg">{{ $feature->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <x-hint>
            @markdown($layout->outro)
            <svg xmlns="http://www.w3.org/2000/svg" width="45.46" height="43.01"
                class="absolute right-0 top-0 h-auto w-16 -translate-y-1/3 translate-x-1/3" viewBox="0 0 45.46 43.01">
                <defs>
                    <style>
                        .prefix__a7dh4hd__cls-2 {
                            fill: none;
                            stroke: #151616;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-width: 1.77px
                        }
                    </style>
                </defs>
                <path fill="#fff"
                    d="M2.72 30.51c.14.38.28.75.41 1.13 2.51 7.39 21.93 16.52 32.35 7.83 6.11-5.09 10.69-8.76 9.89-19.16A20.68 20.68 0 0 0 27.59 2.44s-17.57-4-25 11.26c-3.28 6.69-.74 14.53.13 16.81Z" />
                <circle cx="19.08" cy="19.08" r="18.19" class="prefix__a7dh4hd__cls-2" />
                <path d="m13.84 17.62 5.1 6.52L29.73 9.1" class="prefix__a7dh4hd__cls-2" />
                <path d="M31.59 18.98a12.38 12.38 0 1 1-7.77-11.51" class="prefix__a7dh4hd__cls-2" />
            </svg>
        </x-hint>

    </div>
</div>
