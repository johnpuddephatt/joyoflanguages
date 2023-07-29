  <div class="container mx-auto">
      <h2 class="mb-8 max-w-lg text-2xl font-bold lg:text-4xl">{!! $layout->title !!}</h2>
      @if ($layout->subtitle)
          <div class="mt-8 max-w-sm">{!! Str::of($layout->subtitle)->markdown() !!}</div>
      @endif

      @if ($layout->posts && $layout->posts->count())
          <div class="my-16 grid gap-16 lg:grid-cols-2">
              @foreach ($layout->posts as $post)
                  <x-post.card class="" :post="$post" />
              @endforeach
          </div>
      @endif

      @if ($layout->view_all_posts_link)
          <x-button-link href="{{ $layout->view_all_posts_link }}?tag={{ $layout->tag }}">View all posts</x-button-link>
      @endif
  </div>
