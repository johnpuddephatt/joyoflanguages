<div class="container my-16 mx-auto flex flex-row gap-4">
    @foreach ((array) $layout->squares as $key => $value)
        <div class="aspect-square flex-1 bg-beige p-4">
            <h2>{{ $key }}</h2>
            {{ $value }}
        </div>
    @endforeach

</div>
