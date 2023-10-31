<div class="pb-12 lg:pb-24">
    <div class="{{ $class ?? 'mx-auto container-lg' }} grid gap-x-24 gap-y-16 lg:grid-cols-2">

        @foreach ($layout->team as $member)
            <div class="block">
                <div class="relative bg-black" @mouseEnter="$refs.video.play(); playing= true"
                    @mouseLeave="$refs.video.pause(); $refs.video.currentTime = 0; playing= false"
                    x-data="{ playing: false }">
                    <x-library-image x-transition.opacity.duration.500ms x-show="!playing" :image="$member->photo"
                        conversion="3x2" class="duration-250 mx-auto block w-full transition" />
                    @if ($member->video)
                        <video x-ref="video" @ended="$refs.video.currentTime = 0; playing= false" muted
                            class="absolute inset-0 z-10 h-full w-full" x-show="playing"
                            x-transition:enter.duration.500ms.delay.250ms x-transition:leave.duration.1000ms>
                            <source src="{{ Storage::url($member->video->mp4) }}" type="video/mp4">
                            <source src="{{ Storage::url($member->video->webm) }}" type="video/webm">

                        </video>
                    @endif
                </div>
                <h3 class="mt-6 text-3xl font-bold text-blue">{{ $member->name }}</h3>

            </div>
        @endforeach
    </div>
</div>
