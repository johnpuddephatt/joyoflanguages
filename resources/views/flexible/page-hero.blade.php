<div class="mx-auto flex max-w-5xl flex-row pt-48 pb-24">
    <div class="w-1/2 pr-16">

        <div class="mb-4 text-2xl font-bold text-light-teal">{{ $layout->pretitle }}</div>
        <h1 class="mb-8 text-5xl font-bold">{{ $layout->title }}</h1>
        <p>{{ $layout->description }}</p>
    </div>
    <x-responsive-image conversion="landscape" :image="$layout->image" class="w-1/2" />
</div>
