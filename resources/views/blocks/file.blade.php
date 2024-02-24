@if (isset($attrs['media']))
    <div class="{{ $class }}">
        <a href="{{ \Outl1ne\NovaMediaHub\Models\Media::find($attrs['media'])->getUrl() }}"
            class="bg-light-teal group !mb-4 block flex flex-row rounded-full bg-opacity-20 !no-underline transition hover:bg-opacity-80">

            <p class="type-xs my-0 py-3 pl-8">{{ $attrs['title'] }}</p>
            <p
                class="my-1 ml-auto mr-1 flex gap-2 rounded-full border-[3px] bg-white py-1.5 pl-4 pr-6 font-bold text-black md:py-2 md:pl-6 md:pr-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                Download
            </p>
        </a>
    </div>
@endif
