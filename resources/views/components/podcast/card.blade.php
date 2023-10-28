 <a class="flex flex-row items-center gap-4 py-8 lg:gap-8" href="{{ $podcast->url }}">
     <x-image-mask class="hidden h-auto w-24 rounded-3xl bg-yellow p-4 lg:block lg:w-48"> <x-library-image
             conversion="square" :image="$page->image" class="relative block h-auto w-full" />
     </x-image-mask>

     <div>
         @if ($podcast->episode_number)
             <p class="type-xs">Episode {{ $podcast->episode_number }}</p>
         @endif
         <h3 class="type-sm">{{ $podcast->title }}
         </h3>
         <p class="prose mb-4 max-w-xl leading-snug">{{ $podcast->introduction }}</p>
         <div class="flex flex-row items-center gap-2 font-semibold lg:gap-4">
             <svg class="h-4 w-4 lg:h-6 lg:w-6" xmlns="http://www.w3.org/2000/svg" width="46.93" height="46.93"
                 viewBox="0 0 46.93 46.93">
                 <circle fill="#4badb8" cx="23.46" cy="23.46" r="23.46" />
                 <path fill="#fff" stroke="#12171e" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="1.72px"
                     d="M844,1935.9a2.86,2.86,0,0,1,0,4.65l-8.37,5.43-8.37,5.43c-1.59,1-3.58-.25-3.58-2.32v-21.73c0-2.07,2-3.36,3.58-2.33l8.37,5.43Z"
                     transform="translate(-808.69 -1915.16)" />
             </svg>

             <div>{{ $podcast->published_at->format('d M Y') }}</div>
             <span class="h-2 w-2 rounded-full bg-black bg-opacity-20"></span>
             <div>{{ explode(':', $podcast->duration)[0] }} min {{ explode(':', $podcast->duration)[1] }} sec</div>
         </div>
     </div>
 </a>
