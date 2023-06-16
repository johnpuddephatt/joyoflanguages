<div class="bg-white py-12 lg:py-24">
    <div class="container grid gap-x-12 gap-y-16 lg:grid-cols-3 lg:gap-y-24">

        @foreach ($layout->team as $member)
            <a href="{{ $member->url }}" class="block text-center">
                <x-image :image="$member->photo" conversion="2x3" class="block w-full bg-gray" />
                <h3 class="mt-6 mb-2 text-4xl font-bold lg:mt-12 lg:mb-4">{{ $member->name }}</h3>
                <p class="text-2xl font-bold">{{ $member->role }}</p>
            </a>
        @endforeach
    </div>
</div>
