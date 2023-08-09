@include('flexible.text-with-image', ['layout' => $layout])
<div class="container mx-auto flex w-full max-w-6xl flex-row gap-4 overflow-hidden py-16">
    @foreach ((array) $layout->squares as $key => $value)
        <div class="flex aspect-square flex-1 flex-col items-center justify-center bg-beige p-4 text-center">
            <h3 class="mb-2 text-2xl font-bold">{{ $key }}</h3>
            {{ $value }}
        </div>
    @endforeach

</div>
