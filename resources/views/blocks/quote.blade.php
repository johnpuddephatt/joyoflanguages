<blockquote class="{{ $class }} border-l-0">
    <svg class="h-auto w-12" xmlns="http://www.w3.org/2000/svg" width="93.97" height="76.13" viewBox="0 0 93.97 76.13">
        <path fill="#4badb8"
            d="M22.16 76.13C10.39 76.13 0 67.82 0 48.89c0-20.55 8.54-36 16.62-47.56 1.39-1.85 3.23-1.61 5.31-.23l7.39 5.08c1.85 1.15 1.62 3.23 0 5.54-6 8.31-11.31 18.7-11.31 28.17a5.72 5.72 0 0 0 .23 1.84 14.55 14.55 0 0 1 8.08-2.31c10.39 0 15.7 8.32 15.7 18 0 10.59-8.54 18.71-19.86 18.71Zm52 0C62.38 76.13 52 67.82 52 48.89c0-20.55 8.54-36 16.62-47.56C70-.52 71.85-.28 73.93 1.1l7.39 5.08c1.85 1.15 1.61 3.23 0 5.54-6 8.31-11.32 18.7-11.32 28.17a5.49 5.49 0 0 0 .24 1.84 14.53 14.53 0 0 1 8.08-2.31c10.39 0 15.7 8.32 15.7 18-.05 10.59-8.62 18.71-19.91 18.71Z" />
    </svg>

    <div class="my-4 text-lg font-bold not-italic">{{ $attrs['quote'] }}</div>
    <svg class="ml-auto block h-auto w-12" xmlns="http://www.w3.org/2000/svg" width="93.97" height="76.13"
        data-name="Layer 1" viewBox="0 0 93.97 76.13">
        <path fill="#4badb8"
            d="M19.86 0c11.77 0 22.16 8.31 22.16 27.25 0 20.55-8.54 36-16.62 47.56-1.39 1.84-3.23 1.61-5.31.23l-7.39-5.08c-1.85-1.16-1.38-3.46 0-5.54 5.77-8.54 11.31-18.7 11.31-28.17a5.8 5.8 0 0 0-.23-1.85 14.44 14.44 0 0 1-8.07 2.31C5.31 36.71 0 28.4 0 18.71 0 8.08 8.54 0 19.86 0Zm51.95 0c11.77 0 22.16 8.31 22.16 27.25 0 20.55-8.54 36-16.62 47.56-1.39 1.84-3.23 1.61-5.31.23l-7.39-5.08c-1.85-1.16-1.38-3.46 0-5.54 5.77-8.54 11.31-18.7 11.31-28.17a5.8 5.8 0 0 0-.23-1.85 14.5 14.5 0 0 1-8.08 2.31c-10.39 0-15.7-8.31-15.7-18C51.95 8.08 60.49 0 71.81 0Z" />
    </svg>

    <div class="flex flex-row items-center gap-2">
        <x-library-image class="my-0 h-16 w-16 rounded-full object-cover" :image="\Outl1ne\NovaMediaHub\Models\Media::find($attrs['media'])" conversion="square" />
        <div class="text-xl font-bold not-italic text-blue">{{ $attrs['name'] }}</div>
    </div>
</blockquote>
