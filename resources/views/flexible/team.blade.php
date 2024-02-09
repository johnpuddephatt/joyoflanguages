<div id="{{ $layout ? $layout->key() : null }}" class="pb-12 lg:pb-24">
    <div class="{{ $class ?? 'mx-auto container 2xl:container-lg' }} grid gap-x-16 gap-y-16 lg:grid-cols-2 2xl:gap-x-24">

        @foreach ($layout->team as $member)
            <div @click="document.body.classList.add('overflow-hidden'); document.location.hash = '#{{ $member->slug }}'; $refs.modal_user_{{ $member->id }}.showModal()"
                x-init="document.location.hash == '#{{ $member->slug }}' ? $refs.modal_user_{{ $member->id }}.showModal() : null" class="" x-data="{ modalOpen: false, shown: false, playing: false }"
                @if ($member->video) @mouseEnter="$refs.video.play(); playing= true"
                @mouseLeave="$refs.video.pause(); $refs.video.currentTime = 0; playing= false" @endif>
                <div class="group relative aspect-video overflow-hidden rounded bg-black">

                    <x-library-image :image="$member->photo" conversion="3x2"
                        class="mx-auto block w-full transition duration-200 group-hover:scale-105 group-hover:duration-1000" />

                    @if ($member->video)
                        <video disableRemotePlayback x-ref="video" @ended="$refs.video.currentTime = 0; playing= false"
                            muted x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-105"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-105"
                            class="absolute inset-0 z-10 aspect-video h-full w-full object-cover transition duration-200"
                            x-show="playing">
                            <source src="{{ Storage::url($member->video->mp4) }}" type="video/mp4">
                            <source src="{{ Storage::url($member->video->webm) }}" type="video/webm">
                        </video>
                    @endif
                </div>
                <h3 class="type-sm mt-6">{{ $member->name }}</h3>
                <p class="text-gray-500 mt-2 text-lg">{{ $member->position }}</p>
                <x-button class="mt-auto !w-auto !border-2 !px-4 !py-1.5 shadow-yellow"
                    @click.stop="document.body.classList.add('overflow-hidden');document.location.hash = '#{{ $member->slug }}';$refs.modal_user_{{ $member->id }}.showModal()">View</x-button>
                <dialog @close="document.body.classList.remove('overflow-hidden');"
                    class="z-50 w-full max-w-xl overscroll-contain rounded-3xl border-[3px] border-black backdrop:overscroll-contain backdrop:bg-beige backdrop:bg-opacity-50 backdrop:backdrop-blur-md"
                    x-ref="modal_user_{{ $member->id }}">
                    <form method="dialog">
                        <div class="aspect-video overflow-hidden">
                            <x-library-image :image="$member->photo" conversion="3x2"
                                class="mx-auto block w-full transition duration-200 group-hover:scale-105 group-hover:duration-1000" />
                        </div>
                        <button
                            class="absolute right-2 top-2 block w-10 rounded-full before:fixed before:inset-0 before:-z-10 focus:outline-none lg:right-4 lg:top-4"
                            @click.stop="$refs.modal_user_{{ $member->id }}.close(); console.log('closing dialog {{ $member->id }}');"
                            aria-label="Close modal window">@svg('plus', ' rotate-45 stroke-3 rounded-full border-white  text-white border-[3px] p-2  w-10 h-10')</button>
                        <div>
                            <div class="bg-beige bg-opacity-50 p-6 lg:p-12">

                                <h2 class="type-lg">{{ $member->name }}
                                </h2>

                                <div class="prose">{!! $member->biography !!}</div>
                            </div>

                        </div>
                    </form>
                </dialog>
            </div>
        @endforeach
    </div>
</div>
