@if ($layout->posts->count())
    <div class="relative">
        <div class="container mx-auto py-12 lg:py-16">
            <h2 class="type-lg">{{ $layout->title ?? 'Latest posts' }}</h2>
            <div class="grid gap-16 pt-8 lg:grid-cols-2">
                @foreach ($layout->posts as $post)
                    <x-post.card class="" :post="$post" />
                @endforeach
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="550.29" height="594.48"
            class="absolute -top-24 right-0 -z-10 w-48 lg:top-0 lg:w-64" viewBox="0 0 550.29 594.48">
            <defs>
                <style>
                    .cls-1 {
                        fill: none;
                    }

                    .cls-2 {
                        clip-path: url(#clip-path);
                    }

                    .cls-3 {
                        fill: #edafb4;
                    }
                </style>
                <clipPath id="clip-path">
                    <rect class="cls-1" width="551.1" height="592.97" />
                </clipPath>
            </defs>
            <g class="cls-2">
                <path class="cls-3"
                    d="M8.34,229.89c1.2-5.63,2.23-11.29,3.22-17C30.65,102.79,285-69.79,451.93,29.87,549.73,88.26,622.73,130,634.75,279c5.68,70.34-31.61,233.91-211.73,292.55,0,0-239.7,95.61-379.12-103.37C-17.36,380.72,1.08,264.17,8.34,229.89Z" />
            </g>
        </svg>

    </div>
@endif
