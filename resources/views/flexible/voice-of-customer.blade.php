 @if ($layout->quotes)
     @php
         $quotes = collect($layout->quotes)
             ->shuffle()
             ->chunk(3);
     @endphp
     <section id="{{ $layout ? $layout->key() : null }}" class="">
         <div class="bg-yellow py-16 xl:py-24">

             <div x-data="{
                 rowCount: {{ $quotes->count() }},
                 currentRow: -1,
                 shown: true,
                 quoteTimer: null,
             
                 initialised: false,
                 initialise() {
                     if (this.initialised) return;
                     this.initialised = true;
                     this.currentRow = 0;
                     quoteTimer = setInterval(() => {
                         this.currentRow = ((this.currentRow + 1 < this.rowCount) ? this.currentRow + 1 : 0);
                     }, 6000)
                     document.addEventListener('visibilitychange', () => {
                         if (document.hidden) {
                             this.shown = false;
                             this.currentRow = 0;
             
                         } else {
                             this.shown = true;
                             this.currentRow = 0;
                         }
                     });
                 },
             }" class="container mx-auto !pr-4"
                 x-intersect="if(!initialised) {initialise()}; shown = true" x-intersect:leave="shown = false">
                 <div class="flex flex-col gap-24 lg:gap-16 xl:flex-row xl:items-center xl:gap-0">
                     <div class="xl:w-3/5">
                         <h2 class="underline-bold type-xl !mb-8">
                             @inlineMarkdown($layout->title)
                         </h2>
                         @if ($layout->intro)
                             <div class="prose-standout prose max-w-xl !text-black">@markdown($layout->intro)</div>
                         @endif

                         {{-- <div class="prose-lg mt-6 font-semibold !leading-tight">
                             @markdown($layout->outro)
                         </div> --}}

                     </div>
                     <div class="relative z-10 grid max-w-xl grid-cols-2 grid-rows-2 overflow-visible xl:w-2/5">
                         @foreach ($quotes as $row => $quoteRow)
                             @php($bubbles = collect([1, 2, 3])->shuffle())
                             @foreach ($quoteRow->shuffle() as $key => $quote)
                                 <div x-show="currentRow == {{ $row }}"
                                     x-transition:enter="transition ease-out duration-[1500ms] delay-[{{ 750 + $bubbles[$key] * 250 }}ms]"
                                     x-transition:enter-start="opacity-0 scale-75"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-out duration-[500ms] delay-[{{ $bubbles[$key] * 250 }}ms] -z-10"
                                     x-transition:leave-end="scale-75 opacity-0"
                                     class="{{ ($key % 2) - ($row % 2) ? 'col-start-2' : 'col-start-1' }} row-start-{{ $key + 1 }} type-sm relative col-span-1 flex aspect-[2] h-24 items-center justify-center px-1 text-center !leading-none lg:h-32 lg:px-4">
                                     {{ $quote->quote }}
                                     @svg('bubble-' . $bubbles[$key], 'absolute  -z-10 -left-3 w-[calc(100%+1.5rem)] -right-3 h-auto top-1/2 -translate-y-1/2 max-w-none')
                                 </div>
                             @endforeach
                         @endforeach
                     </div>

                 </div>
             </div>

             <div class="container mx-auto hidden max-w-3xl">
                 <div
                     class="prose bg-pink relative mb-16 mt-0 flex w-full translate-y-1/2 flex-row rounded-3xl px-4 py-6 lg:items-center lg:px-8">

                     <svg class="h-auto w-20 flex-none lg:w-32" xmlns="http://www.w3.org/2000/svg" width="104.23"
                         height="121.75" viewBox="0 0 104.23 121.75">
                         <path fill="#ffffff"
                             d="M91.21 53.61a51.2 51.2 0 0 1-.47-2.47c-2.78-16-39.78-41.12-64.06-26.63C12.45 33.01 1.83 39.07.08 60.75c-.82 10.23 4.6 34 30.8 42.56 0 0 34.87 13.91 55.16-15 8.91-12.76 6.22-29.71 5.17-34.7Z" />
                         <g fill="none" stroke="#0f1115" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="1.5">

                             <path
                                 d="m26.01 82.9-7.92 19.07 22.86 3.68.74 11.25H12.76a10.82 10.82 0 0 1-5.57-1.54h0a10.82 10.82 0 0 1-5.05-11.37l.76-3s5.93-21.75 7.18-25.36c3.42-9.87 14-18.58 20.64-19.84h0l-.16-2.14a1.78 1.78 0 0 1 1.63-1.9l15.42-1.29a.93.93 0 0 1 1 .79l.69 4.42c.16.06 6.52 2.9 11.24 5a8.86 8.86 0 0 1 5.2 7.83c0 2 .08 4 0 4.7l-.83 12.27 18.26-21.93c.72.45 7.73 9.47 8.2 10.4s-11 21.38-11 21.38-4.93 9.43-7.63 10.77c-7.66 3.81-13.86-1.83-15.17-3.16" />
                             <path
                                 d="M41.01 106.97c5.4 3.7 15.48-.56 18.11-.85a.82.82 0 0 1 .65 1.42 3.15 3.15 0 0 1-.81.52 21.92 21.92 0 0 1-3.16 1.11l6.21 1.73c1.65.31 4.15.88 4.22 1.76s-.73.46-2.13.5-3.27.11-3.38.07a50.12 50.12 0 0 1 5.75 2.12c.65 1.38-3.17.88-4.68.42 0 0 4.63 2.06 3.41 2.63-1 .45-5.41-1.09-5.44-.67s2.82 1.94 3.08 2.75c.14.46-.64 1.1-1.82.49-9.08-4.68-17.91-4.65-19.46-5.36m20.87-91.92s.2-2.76-.78 8.47c-.75 2 6.57 6-1.5 3.39-1.45 2.91-3.81 14-17.4 8m-1.03-14.92c-2.09-2.31-3.28-6.92-8.23-5.29s-2.85 8.71-.24 9 3.13-.4 3.13-.4.15 11.19-3.13 19.35" />
                             <path d="M34.91 25.14c2.37-.1 2 3.32 2 3.32s-.45-1.93-2.72-1" />
                             <ellipse cx="56.52" cy="30.97" fill="#0f1115" rx=".59" ry=".98" />
                             <path
                                 d="M59.1 37.69a2.42 2.42 0 0 1-4-.72m-8.42 8.34s-1.25 3.89-.48 5.3m1.6-34.6s5.3 4.88 10.18 3.41 2.52 6.18 7.49 4.33 9.25-10.94 0-12.62c-8.35-1.51-3.79 10.6 2.1 4.12s-.35-8.68-.35-8.68M46.68 8.69s2.05 11.36-3.93 8.83.51 7.66-1.34 8.33" />
                             <path
                                 d="M60.08 9.95s-8.07-16.15-18-6.14c-6.44 6.48-12.65-2.61-13.12 5.55s-9.14 10.39-2.75 19.52.34 7.4.34 7.4m9.55-3.63s-1.66 7.53-5.61 4.32m24.46 62.75-1.59-18.59M85.62 65.8s2.51-13.33 3.86-13.08 5.59 1.86 5.34 3.49-2.93.15-2.93.15" />
                             <path d="M92.23 53.71s3.42-11.51 5.73-10.78c1.58.49-1.82 8.51-1.82 8.51" />
                             <path
                                 d="m94.54 55.02 1.6-3.58s.54-.69 2.27.29c.79.45.7-.75 2.67 1.28 1.06 1.1 1.16 0 2.36 1.08 1.51 1.39-4 11.67-6.46 12.57-3.47 1.27-5.44 1.81-5.44 1.81l-2.18 2.43" />
                             <path d="M98.58 52.35s-1.61 4.18-2.25 4.67-1.36-.2-1.36-.2" />
                             <path
                                 d="M96.33 57.02s1.3 2.31 2.23 1.08a39.65 39.65 0 0 0 2.45-4.2m-2.06 3.76s0 2.06 1.28 1.85c1.49-.25 3.42-4.45 3.42-4.45" />
                         </g>
                     </svg>

                     <div class="prose pl-2 !leading-tight lg:pl-6">
                         @markdown($layout->outro)
                     </div>
                 </div>
             </div>
         </div>
     </section>
 @endif
