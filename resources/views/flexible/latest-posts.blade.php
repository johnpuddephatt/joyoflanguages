@if ($layout->posts->count())
    <div class="container mx-auto my-16 grid gap-16 lg:grid-cols-2">
        @foreach ($layout->posts as $post)
            <x-post.card class="" :post="$post" />
        @endforeach
    </div>
@endif
