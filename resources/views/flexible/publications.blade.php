<div class="relative py-16 pb-48 lg:pb-16">
    <div class="{{ $class ?? 'max-w-6xl ' }}">

        @foreach ($layout->publications as $publication)
            <div
                class="relative my-8 flex w-full flex-row gap-6 bg-light-teal p-6 lg:items-center lg:gap-12 lg:bg-opacity-80 lg:p-12">
                @if ($publication->type == 'radio')
                    @svg('radio', 'w-16 h-auto')
                @endif
                @if ($publication->type == 'article')
                    @svg('article', 'w-16 h-auto')
                @endif

                <div>
                    <p class="text-xl font-bold">{{ $publication->publication_name }}</p>

                    <h2 class="mb-4 text-3xl font-bold">{{ $publication->title }}</h2>
                    <x-button-link class="shadow-yellow" href="{{ $publication->link }}">
                        {{ $publication->button_text ?? 'Read more' }}</x-button-link>
                </div>

            </div>
        @endforeach

    </div>
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="651.22" height="715.47"
        class="absolute bottom-0 right-0 -z-10 h-auto w-96" viewBox="0 0 567 715.5">
        <path fill="#f4af6b"
            d="M24.3 350.9c1.2-5.6 2.2-11.3 3.2-17C46.6 223.8 300.9 51.2 467.9 150.8c97.8 58.4 170.8 100.1 182.8 249.1 5.7 70.3-31.6 233.9-211.7 292.5 0 0-239.7 95.6-379.1-103.4C-1.4 501.7 17 385.2 24.3 350.9z" />
        <path fill="#ffd703"
            d="M281.9 129.6c-.1-2.6-.1-5.1 0-7.7.6-49.8-96.9-146.3-178.2-116.2C56 23.3 20.6 35.7 3.2 100-5 130.4-2 205.2 72.2 245.6c0 0 97.3 61.5 174.7-14.4 34-33.3 35.4-86 35-101.6z" />
    </svg>
</div>