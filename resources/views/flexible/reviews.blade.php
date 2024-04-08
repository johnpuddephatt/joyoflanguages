 @if ($layout->reviews)

     <section id="{{ $layout ? $layout->key() : null }}" class="">
         <div class="bg-blue py-16 xl:py-24">

             <div class="container mx-auto mb-12 text-center">
                 <h2 class="underline-bold type-xl !mb-8">
                     @inlineMarkdown($layout->title)
                 </h2>
                 @if ($layout->intro)
                     <div class="prose-standout prose mx-auto max-w-xl !text-black">@markdown($layout->intro)</div>
                 @endif
             </div>

             {{-- <div class="scrollbar-hide mt-8 flex flex-row gap-4 overflow-x-auto px-4"> --}}

             <x-swiper :centered_slides="false" :item_count="count($layout->reviews)">
                 @foreach ($layout->reviews as $myreview)
                     @if ($myreview instanceof stdClass)
                         @php($myreview = $myreview->attributes)
                     @endif

                     <div class="swiper-slide aspect-square !h-auto flex-none rounded-lg bg-white p-4">
                         <div class="mb-6 flex flex-row items-center gap-2">
                             @if (isset($myreview->image))
                                 <img class="h-7 w-7 rounded-full object-cover" src="{{ Storage::url($myreview->image) }}"
                                     alt="{{ $myreview->name }}">
                             @else
                                 <div class="bg-blue h-7 w-7 rounded-full"></div>
                             @endif
                             {{ $myreview->name }}
                         </div>

                         <h3 class="type-xs mb-1">{{ $myreview->title }}</h3>
                         <div class="prose">{{ $myreview->review }}</div>

                     </div>
                 @endforeach
             </x-swiper>
             {{-- </div> --}}

         </div>

     </section>
 @endif
