 <a class="block" href="{{ $podcast->url }}">
     <p class="text-2xl">Episode {{ $podcast->episode_number }}</p>
     <h2 class="mb-2 text-3xl">{{ $podcast->title }}</h2>
     <p class="mb-2">{{ $podcast->introduction }}</p>
     <div class="flex flex-row items-center gap-4">
         <div>{{ $podcast->published_at->format('d M Y') }}</div>
         <span class="h-2 w-2 rounded-full bg-black"></span>
         <div> XX min XX sec</div>
     </div>
 </a>
