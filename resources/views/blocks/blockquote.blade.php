<div class="not-prose {{ $class }} type-sm my-16 bg-beige px-4 py-16 lg:px-8">
    <blockquote class="mx-auto max-w-2xl">
        @foreach ($content as $quoteLine)
            @include('blocks.' . $quoteLine['type'], [
                'content' => $quoteLine['content'],
                'class' => 'foo',
            ])
        @endforeach
    </blockquote>

</div>
