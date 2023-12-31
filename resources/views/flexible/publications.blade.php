    <div id="{{ $layout ? $layout->key() : null }}"
        class="{{ $class ?? 'mx-auto max-w-5xl ' }} container relative py-8 pb-24 lg:pb-16">

        @foreach ($layout->publications as $publication)
            <div
                class="relative mb-4 flex w-full flex-col gap-4 bg-light-teal p-6 lg:flex-row lg:items-center lg:gap-6 lg:bg-opacity-80">
                @if ($publication->type == 'radio')
                    @svg('radio', 'flex-none w-16 lg:w-20 h-auto')
                @endif
                @if ($publication->type == 'article')
                    @svg('article', 'w-16 lg:w-20 flex-none h-auto')
                @endif

                <div class="flex-1">
                    <p class="type-xs">{{ $publication->publication_name }}</p>
                    <h3 class="type-sm">{{ $publication->title }}</h3>
                </div>
                <x-button-link class="mr-auto shadow-yellow lg:mr-0" target="_blank" href="{{ $publication->link }}">
                    {{ $publication->button_text ?? 'Read more' }}</x-button-link>

            </div>
        @endforeach
        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="651.22" height="715.47"
            class="absolute -bottom-24 right-0 -z-10 h-auto w-56 lg:bottom-0 lg:w-96" viewBox="0 0 567 715.5">
            <path fill="#f4af6b"
                d="M24.3 350.9c1.2-5.6 2.2-11.3 3.2-17C46.6 223.8 300.9 51.2 467.9 150.8c97.8 58.4 170.8 100.1 182.8 249.1 5.7 70.3-31.6 233.9-211.7 292.5 0 0-239.7 95.6-379.1-103.4C-1.4 501.7 17 385.2 24.3 350.9z" />
            <path fill="#ffd703"
                d="M281.9 129.6c-.1-2.6-.1-5.1 0-7.7.6-49.8-96.9-146.3-178.2-116.2C56 23.3 20.6 35.7 3.2 100-5 130.4-2 205.2 72.2 245.6c0 0 97.3 61.5 174.7-14.4 34-33.3 35.4-86 35-101.6z" />
        </svg>
    </div>
