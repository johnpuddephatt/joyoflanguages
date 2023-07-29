<div class="not-prose {{ $class }} my-16 bg-beige py-16 px-4 text-2xl font-bold lg:px-8">
    <blockquote class="mx-auto max-w-2xl">
        @foreach ($content as $quoteLine)
            @include('blocks.' . $quoteLine['type'], [
                'content' => $quoteLine['content'],
                'class' => 'foo',
            ])
        @endforeach
    </blockquote>

</div>
