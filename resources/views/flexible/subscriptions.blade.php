<div class="relative py-32">
    <svg xmlns="http://www.w3.org/2000/svg" width="272.39" height="209.79"
        class="absolute -top-px left-4 h-auto w-40 lg:left-16 lg:w-96" viewBox="0 0 272.39 209.79">

        <path fill="#4ba3ae"
            d="M35.23.7c-.38 10.3 1 21.89 4.55 35.38 6.67 25.25 39.79 77.78 109.88 76.11 0 0 95.45 3.91 119.66-82.7A93 93 0 0 0 272.22 0" />
        <path fill="#e9abb0"
            d="M128.19 109.75c-.46-1.12-.88-2.25-1.29-3.39-8-22.07-67.07-48.33-97.9-21.51-18.07 15.71-31.62 27-28.57 58.32 1.44 14.76 15.23 47.21 54.66 52.65 0 0 53.14 10.88 74.59-35.46 9.44-20.36 1.29-43.79-1.49-50.61Z" />
        <g fill="none" stroke="#12171e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2px">
            <path
                d="M86.46 208.79s6.38-15.69 10.63-29.59 1.3-33.67-4.91-53.78-5.94-19.34-.88-40.39c2.78-11.53 15.43-25.32.56-25.16s-24 43.48-24 43.48-.08 2.94-1.43 3.1-25.41-10.87-34.37-5.88c-4.54 2.53-10.62 13.57 7.69 21.25s21.74.82 21.57-6.21-18.47-8.17-18.47-8.17" />
            <path d="M28.69 113.57s-7.78-.74-7.46 6.94 12.75 19.62 35.8 18.64c9.36-1 10-10.63 1.14-15.37" />
            <path d="M25.93 129.38s-8 3-3.23 9.83 10.14 14 31.56 9.58c4.74-1.63 6.7-5.23 2.77-9.64" />
            <path
                d="M25.28 142.68s-7.64 1.54-6 8.4 10 10 22.72 8.83 8-10.35 8-10.35m-20.1 10.58s.49 6.64 23.54 6.47c8.5-.81 11.36 3.27 11 11.94s-7.23 19.29-7.23 19.29" />
        </g>
    </svg>

    @include('components.block-intro', ['layout' => $layout])

    @if ($layout->subscriptions)
        <div
            class="container mx-auto flex max-w-3xl flex-col-reverse items-center justify-center gap-8 pt-16 lg:flex-row lg:gap-3">
            @foreach ($layout->subscriptions as $subscription)
                <div
                    class="@if ($subscription->sticker) flex-[55%] @else flex-[50%] @endif relative min-h-[12rem] bg-beige p-8">
                    <div
                        class="@if ($subscription->pre_title) bg-light-teal @endif mb-3 inline-block rounded-full px-2 font-bold text-white">
                        {!! $subscription->pre_title ?? '&nbsp;' !!}
                    </div>

                    @if ($subscription->title)
                        <h3 class="mb-6 text-3xl font-bold leading-tight">{{ $subscription->title }}</h3>
                    @endif
                    @if ($subscription->sticker)
                        <div
                            class="absolute left-full top-0 flex aspect-square w-min -translate-x-2/3 -translate-y-1/3 items-center justify-center rounded-full bg-black p-6 text-center text-xl font-bold leading-none text-white">
                            {{ $subscription->sticker }}</div>
                    @endif
                    @if ($subscription->price)
                        <div class="mb-6 text-lg font-bold">{{ $subscription->price }}</div>
                    @endif
                    @if ($subscription->description)
                        <div class="text-sm">{{ $subscription->description }}</div>
                    @endif
                    @if ($subscription->url)
                        <x-button-link class="mt-8 shadow-yellow" :href="$subscription->url">Subscribe</x-button-link>
                    @endif
                </div>
            @endforeach
        </div>
    @endif

    @if ($layout->outro)
        <x-hint>
            @markdown($layout->outro)

            <svg class="absolute right-0 top-full h-auto w-36 -translate-y-1/4 lg:-translate-y-1/2 lg:translate-x-1/2"
                xmlns="http://www.w3.org/2000/svg" width="100.43" height="103.26" viewBox="0 0 100.43 103.26">

                <path fill="#ffce00"
                    d="M49.61 102.92a.35.35 0 0 0 .65.15c3.59-6.78 5.17-26 6.13-22.33.46 1.75 9.29 13.15 10.58 15.53s1.11 4.3 1.79 3.14c3.66-6.87-2.18-16.5-3.66-20.6s.84-6.87 1.22-5.46c2.06 7.64 14.13 10.72 15.92 12.26S85 91.45 85 88.05s-3.4-9.24-7.25-11.94-7.13-12.64-5.65-9.05 11.75 4.11 15.47 3.79 8.54 4.3 8.41 2.31-2.5-6.61-4.88-6.87c-9.24-1.61-17.46-11.43-15.08-9.18s8.4.32 12 .32 8.73-5.58 10.85-5.07 2.18-.58-.45-2.5-16.31-1.42-17.65-1.48-4.24-1.48.38-2.05 9.82-8.48 11.3-10.27 8.21-1.09 4-2.7-7.9-.38-12.07 1.8-9 1.73-10.59 1.8 4.62-6.68 6.23-7.13 5-9.63 5.77-11.1 4.11-3 4.11-3.73-2.7-.51-6.74.39-3.91 10.08-8.66 9.69-6.17 2.12-7.84 2.5-.51-1.6-.51-1.6c2.31-2.44 3.08-10.27 3.21-15.28s3.72-6.54.9-6.29-8.54 5.65-8.47 10.27c0 2.7-6.81 11.3-6.17 7.19.84-5.35.39-8-3.26-14.48-1.43-2.57.83-8.5-1.61-7.21s-3.47 9.73-3.47 12.58a19.14 19.14 0 0 1-2.57 9.11c-5.52 4.75-6-7.19-6-7.19.06-4.62-5.65-10-8.47-10.27s.77 1.29.89 6.29.9 12.84 3.21 15.28c0 0 1.16 2-.51 1.6s-3.08-2.88-7.83-2.5-4.62-8.79-8.67-9.69-6.74-1.16-6.74-.39 3.34 2.25 4.11 3.73 4.17 10.65 5.78 11.1 7.83 7.19 6.23 7.13-6.42.38-10.6-1.8-7.83-3.4-12.06-1.8 2.5.9 4 2.7 6.67 9.69 11.29 10.27 1.74 2 .39 2.05-15-.45-17.65 1.48-2.57 3-.45 2.5 7.25 5.07 10.85 5.07 9.62 1.93 12-.32-5.84 7.57-15.09 9.18c-2.37.26-4.75 4.88-4.87 6.87s4.68-2.63 8.4-2.31 14-.2 15.47-3.79-1.79 6.35-5.64 9.05-7.26 8.54-7.26 11.94 1-.9 2.76-2.44 13.87-4.62 15.92-12.26c.39-1.41 2.7 1.35 1.22 5.46s-7.32 13.73-3.66 20.6c.68 1.16.52-.77 1.8-3.14s12.45-12.46 12.39-16.44 5.65 5.88 4.36 18.33Z" />
                <ellipse cx="581.6" cy="9719.87" fill="#12171e" rx=".92" ry="1.44"
                    transform="rotate(-3.32 -166596.93 13892.578)" />
                <ellipse cx="566.58" cy="9719.97" fill="#12171e" rx=".92" ry="1.44"
                    transform="rotate(-3.32 -166611.955 13892.66)" />
                <path fill="none" stroke="#12171e" stroke-linecap="round" stroke-linejoin="round"
                    d="M48.54 44.81s-2.6 10.92.79 11.57 4.05-11.05 4.05-11.05m-8.62 13.32s6.58 4.69 10.14-.17" />
            </svg>

        </x-hint>
    @endif

    <svg class="absolute bottom-1/4 right-0 h-auto w-24 2xl:w-48" xmlns="http://www.w3.org/2000/svg" width="132.93"
        height="242.18" viewBox="0 0 132.93 242.18">
        <path fill="#eca76b"
            d="M132.68 36.23c-29.21 1.66-70.09 13-92.64 59.13-16.56 33.89-3.7 73.55.72 85.12.73 1.9 1.4 3.81 2.06 5.74 7.83 23 48 49.34 90.11 56" />
        <path fill="#ffce00"
            d="M93.57 43.03v-2.56c.2-16.55-32.15-48.56-59.15-38.57C18.6 7.75 6.85 11.84 1.06 33.21c-2.73 10.08-1.73 34.9 22.9 48.32 0 0 32.3 20.41 58-4.78C93.23 65.68 93.7 48.22 93.57 43.03Z" />
    </svg>

</div>
