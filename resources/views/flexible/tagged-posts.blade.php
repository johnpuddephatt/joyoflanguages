  <div class="container-lg mx-auto flex flex-col items-start overflow-hidden py-8 lg:flex-row lg:gap-8 lg:py-16">
      <div x-data="{ canPlay: false, playing: false }" class="relative flex-1 lg:mb-16 lg:w-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" width="1360.37" height="1301.42"
              class="-mx-16 mb-8 h-auto w-[calc(100%+8rem)] md:mx-0 md:w-full" viewBox="0 0 1360.37 1301.42">
              <defs>
                  <clipPath id="prefix__clip-path" transform="translate(21.71 -3063.94)">
                      <path d="M529.93 3079.69h844.4v965.39h-844.4z" class="prefix__cls-1" />
                  </clipPath>
                  <clipPath id="prefix__clip-path-2" transform="translate(21.71 -3063.94)">
                      <path
                          d="M844.72 3146.63h-.37l-.56-.05h-61.07a6.84 6.84 0 0 0-6.46 6.14v.78a32.74 32.74 0 0 1-32.7 31.19H529.75a32.73 32.73 0 0 1-32.7-31.19v-.78a6.85 6.85 0 0 0-6.47-6.14h-61.1l-.55.05h-.37a41.15 41.15 0 0 0-38.42 41v985.11a41.34 41.34 0 0 0 37.88 41h1.14c.71 0 1.42.05 2.13.05H842c.72 0 1.43 0 2.14-.05h1.14a41.34 41.34 0 0 0 37.87-41v-985.06a41.14 41.14 0 0 0-38.43-41.05Z"
                          class="prefix__cls-1" />
                  </clipPath>
                  <style>
                      .prefix__cls-1 {
                          fill: none
                      }

                      .blur {
                          filter: blur(5px)
                      }
                  </style>
              </defs>
              <path fill="#629ce4"
                  d="M729.6 1171.58c1.49 3.9 2.87 7.83 4.22 11.78 26.12 76.72 227.8 171.53 336.06 81.3 63.43-52.88 111-91 102.74-199.07-3.89-51-49.09-163.92-184.7-185.55 0 0-182.47-41.36-259.8 116.9-33.99 69.54-7.6 150.91 1.48 174.64Z" />
              <g clip-path="url(#prefix__clip-path)">
                  <path fill="#f3b5ba"
                      d="M1338.01 501.3c-.17-6.91-.15-13.81-.07-20.71 1.66-134.1-260.48-393.46-479.21-312.55-128.17 47.41-223.42 80.57-270.3 253.69-22.12 81.7-14 282.81 185.53 391.5 0 0 261.73 165.37 469.83-38.72 91.44-89.68 95.26-231.18 94.22-273.21Z" />
              </g>
              <path fill="#ffd800"
                  d="M93.51 366.76c1.84 4.82 3.55 9.69 5.22 14.58 32.32 94.92 281.85 212.23 415.8 100.58 78.49-65.43 137.33-112.59 127.13-246.3-4.81-63.11-60.74-202.83-228.53-229.58 0 0-225.77-51.18-321.46 144.63-42.05 86.04-9.39 186.73 1.84 216.09Z" />

              <path opacity="0.2" class="translate-x-8 translate-y-8 blur"
                  d="M897.71 1178.76s.08-.05.11-.06h.06ZM870.44 55.22H459.71a76.75 76.75 0 0 0-76.75 76.74v985.1a76.75 76.75 0 0 0 76.75 76.71h410.73a76.75 76.75 0 0 0 76.75-76.71v-985.1a76.75 76.75 0 0 0-76.75-76.74Z" />

          </svg>

          <div class="absolute left-0 top-0 -mx-16 h-full w-[calc(100%+8rem)] md:mx-0 md:w-full">
              <x-responsive-image class="absolute left-[30.5%] top-[5%] h-[78.5%] w-[36%] object-cover object-center"
                  :image="$layout->image" />

              @if ($layout->video)
                  <video x-cloak x-ref="video" x-transition x-show="playing" loop
                      class="absolute left-[30.5%] top-[5%] h-[78.5%] w-[36%] object-cover object-center">
                      <source src="{{ Storage::disk('public')->url($layout->video->mp4) }}" type="video/mp4">
                      <source src="{{ Storage::disk('public')->url($layout->video->webm) }}" type="video/webm">
                  </video>
              @endif
          </div>

          <svg xmlns="http://www.w3.org/2000/svg" width="1360.37" height="1301.42"
              class="absolute left-0 top-0 -mx-16 mb-8 h-auto w-[calc(100%+8rem)] md:mx-0 md:w-full lg:mb-16"
              viewBox="0 0 1360.37 1301.42">
              <style>
                  .cls-67 {
                      fill: #fff;
                      stroke: #12171e;
                      stroke-linecap: round;
                      stroke-linejoin: round;
                      stroke-width: 2.55px;
                  }

                  .cls-68 {
                      fill: #4badb8;
                  }

                  .cls-69 {
                      fill: #ffd800;
                  }

                  .cls-68,
                  .cls-69 {
                      stroke: #0a0a0a;
                      stroke-miterlimit: 10;
                      stroke-width: 2.54px;
                  }
              </style>
              <g class="translate-x-16">
                  <path class="cls-67"
                      d="M879.14,42.11H443.35a63.11,63.11,0,0,0-62.88,63v1027a63.13,63.13,0,0,0,62.88,63H879.14a63.12,63.12,0,0,0,62.9-63v-1027A63.12,63.12,0,0,0,879.14,42.11ZM904.7,1110.4a41.35,41.35,0,0,1-37.89,41.07H449.39a41.35,41.35,0,0,1-37.89-41.07V123.52a41.2,41.2,0,0,1,38.44-41.13h62a6.9,6.9,0,0,1,6.48,6.15v.79a32.77,32.77,0,0,0,32.7,31.24H765a32.78,32.78,0,0,0,32.71-31.24v-.79a6.89,6.89,0,0,1,6.47-6.15h62a41.2,41.2,0,0,1,38.42,41.13Z"
                      transform="translate(-70.81 -0.01)" />
                  <ellipse class="cls-68" cx="562.17" cy="87.43" rx="15.52" ry="15.54" />
                  <ellipse class="cls-69" cx="612.4" cy="87.43" rx="15.52" ry="15.54" />
              </g>
          </svg>
          @if ($layout->video)
              <button x-show="!playing" @click="playing = true, $refs.video.play()" aria-label="Play video"
                  class="absolute left-[5%] top-[47.5%] w-1/3 md:left-[15%] md:w-[23%]">
                  <svg class="block h-auto w-full" xmlns="http://www.w3.org/2000/svg" width="291.37" height="282.94"
                      viewBox="0 0 291.37 282.94">
                      <path fill="#4badb8"
                          d="M2.89 116.52a204.6 204.6 0 0 1-1.7 7.81c-11.78 50.42 65.46 170 154.66 157.73 52.27-7.21 90.94-11.78 123-73.15 15.15-29 28.84-105.45-37.35-163 0 0-84.92-84.14-180.36-24.51C19.22 47.56 6 100.59 2.89 116.52Z" />
                      <path fill="#fff" stroke="#12171e" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="3.5"
                          d="M220.3 136.28a5.44 5.44 0 0 1 0 9.42l-53.06 30.63-53.05 30.63a5.44 5.44 0 0 1-8.16-4.7V79.72a5.44 5.44 0 0 1 8.16-4.7l53.05 30.63Z" />
                  </svg>
              </button>
          @endif

      </div>
      <div class="flex-1 lg:w-1/2">
          <h2 class="type-lg max-w-md">{!! $layout->title !!}</h2>
          @if ($layout->subtitle)
              <div class="prose-standout prose max-w-lg md:mt-8">{!! Str::of($layout->subtitle)->markdown() !!}</div>
          @endif

          @if ($layout->posts && $layout->posts->count())
              <div class="my-8 flex flex-col gap-8 lg:my-16">
                  @foreach ($layout->posts as $post)
                      <x-post.card-wide class="" :post="$post" :hide_tags="true" :hide_date="true" />
                  @endforeach
              </div>
          @endif

          <x-button-link class="shadow-pink" href="{{ $layout->posts_link }}">View all articles</x-button-link>
      </div>
  </div>
