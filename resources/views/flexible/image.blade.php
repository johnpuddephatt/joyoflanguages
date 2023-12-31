<div id="{{ $layout ? $layout->key() : null }}" class="relative py-8 lg:pb-32 lg:pt-16">

    <svg class="pointer-events-none absolute -left-6 top-0 h-auto max-w-4xl" xmlns="http://www.w3.org/2000/svg"
        xml:space="preserve" viewBox="0 0 1913.7 1106.2">
        <path fill="#ffd703"
            d="M1911.6 651.8c-.2-7.1-.2-14.2-.1-21.4 1.7-138.4-268.9-406.1-494.7-322.6-132.3 48.9-230.6 83.2-279 261.9-22.8 84.3-14.5 291.9 191.5 404.1 0 0 270.2 170.7 485-40 94.4-92.6 98.4-238.6 97.3-282z" />
        <path fill="#6799d1"
            d="M461.8 827.7c-.1-4.2-.1-8.4 0-12.6 1-81.7-158.7-239.7-291.9-190.4C91.8 653.6 33.7 673.8 5.2 779.2c-13.5 49.8-8.6 172.3 113 238.5 0 0 159.4 100.7 286.2-23.6 55.7-54.6 58-140.8 57.4-166.4z" />
        <path fill="#4dacb7"
            d="M1735.6 114.6c-.1-2.3-.1-4.5 0-6.8.5-44.1-85.7-129.4-157.6-102.8-42.1 15.6-73.4 26.5-88.9 83.4-7.3 26.9-4.6 93 61 128.7 0 0 86 54.4 154.5-12.7 30.1-29.5 31.3-76 31-89.8z" />
    </svg>

    <div class="container relative max-w-4xl">
        <x-responsive-image class="block w-full max-w-[65ch]" :image="$layout->image" />
    </div>
</div>
