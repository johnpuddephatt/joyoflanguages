<div class="grid lg:grid-cols-2 lg:pt-24">

    <x-responsive-image class="block w-full" :image="$layout->main_image" />

    <div class="container flex flex-col py-8 lg:justify-center">
        <h2 class="type-lg">{{ $layout->title }}</h2>
        <div class="prose-standout prose max-w-md">@markdown($layout->description)

        </div>
        @if ($layout->button_url)
            <x-button-link class="mr-auto mt-8 shadow-yellow lg:mt-12"
                :href="$layout->button_url">{{ $layout->button_text ?? 'Read more' }}</x-button-link>
        @endif
    </div>
</div>

<div class="container mx-auto grid gap-6 py-6 lg:grid-cols-2 lg:gap-0 lg:py-12 2xl:gap-12">
    <div class="mx-auto my-auto max-w-xl">

        @svg('quote-open', 'w-12 text-teal')

        <div class="type-sm !my-0">{!! $layout->quote !!}</div>
        @svg('quote-close', 'ml-auto text-teal block w-12')

        <div class="-mt-4 flex items-center gap-4">
            <x-responsive-image class="w-16 rounded-full" :image="$layout->quote_image" />
            <p class="type-md text-blue">{{ $layout->quote_author }}</p>
        </div>
    </div>

    <div class="">

        <div class="relative">

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-auto w-full"
                width="1015.31" height="721.76" viewBox="0 0 1015.31 721.76">
                <defs>
                    <clipPath id="prefix__clip-path" transform="translate(-1209.42 -655.7)">
                        <rect width="441.61" height="226.22" x="1337.62" y="790.24" fill="none"
                            rx="21.86" />
                    </clipPath>
                    <clipPath id="prefix__clip-path-2" transform="translate(-1209.42 -655.7)">
                        <rect width="441.61" height="226.22" x="1669.46" y="1012.53" class="prefix__cls-2"
                            rx="21.86" />
                    </clipPath>
                    <filter id="drop-shadow">
                        <feDropShadow stdDeviation="5" dx="0" dy="10" flood-opacity="0.2" />
                    </filter>

                </defs>
                <path fill="#ffd800"
                    d="M911.26 302.46c-.14-5.5-.12-11 0-16.51 1.32-106.92-207.69-313.71-382.09-249.2-102.19 37.8-178.13 64.24-215.51 202.27-17.64 65.14-11.19 225.49 147.92 312.15 0 0 208.68 131.85 374.61-30.87 72.85-71.51 75.9-184.33 75.07-217.84Z" />

                <g filter="url(#drop-shadow)">

                    <rect width="513.08" height="313.45" x="92.47" y="77.19" fill="#fff" stroke="#000"
                        stroke-width="3" rx="29.94" />
                </g>
                <g clip-path="url(#prefix__clip-path)">
                    <foreignObject x="130" y="130" width="470" height="220"
                        requiredFeatures="http://www.w3.org/TR/SVG11/feature#Extensibility">
                        <x-responsive-image class="w-full" :image="$layout->phone_image_1" />

                    </foreignObject>

                </g>
                <circle fill="#4badb8" stroke-width="2.31" stroke="#0a0a0a" class="cls-69" cx="132.51" cy="105.5"
                    r="9.53" />
                <circle fill="#ffd800" stroke-width="2.31" stroke="#0a0a0a" class="cls-70" cx="163.34" cy="105.5"
                    r="9.53" />
                <g filter="url(#drop-shadow)">
                    <rect width="513.08" height="313.45" x="424.31" y="300.63" fill="#fff" stroke="#000"
                        stroke-width="3" rx="29.94" />
                </g>
                <g clip-path="url(#prefix__clip-path-2)">
                    <foreignObject x="460" y="350" width="470" height="500"
                        requiredFeatures="http://www.w3.org/TR/SVG11/feature#Extensibility">
                        <x-responsive-image class="w-full" :image="$layout->phone_image_2" />

                    </foreignObject>
                </g>
                <circle cx="463.87" cy="328.94" r="9.53" fill="#4badb8" stroke="#0a0a0a"
                    stroke-miterlimit="10" stroke-width="2.31" />
                <circle cx="494.7" cy="328.94" r="9.53" fill="#ffd800" stroke="#0a0a0a"
                    stroke-miterlimit="10" stroke-width="2.31" />
            </svg>
        </div>

    </div>
</div>
