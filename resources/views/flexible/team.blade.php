<div id="{{ $layout ? $layout->key() : null }}" class="pb-12">
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
                    class="z-50 w-full max-w-lg overscroll-contain rounded-3xl border-[3px] border-black backdrop:overscroll-contain backdrop:bg-beige backdrop:bg-opacity-50 backdrop:backdrop-blur-md"
                    x-ref="modal_user_{{ $member->id }}">
                    <form method="dialog">
                        <div class="relative aspect-video overflow-hidden">
                            <x-library-image :image="$member->photo" conversion="3x2"
                                class="mx-auto block w-full transition duration-200 group-hover:scale-105 group-hover:duration-1000" />

                            @if ($member->id % 2 == 0)
                                <svg xmlns="http://www.w3.org/2000/svg" width="192.89" height="201.61"
                                    class="{{ $member->id % 4 == 0 ? 'text-blue' : 'text-pink' }} absolute left-[15%] top-8 h-auto w-16 lg:w-20"
                                    viewBox="0 0 192.89 201.61">
                                    <path fill="currentColor"
                                        d="M189.43 105.93q10.14-39.69-9.44-69.37T120.71 1.15Q81.02-4.58 47.06 18.37T3.13 80.72q-10 39.4 11.83 68.59t61.85 35a106.38 106.38 0 0 0 28.28.46c40.29 28.31 61.89 15 49.49 3.14-4.21-4-4.67-12.61-3.36-22.38q28.56-21.96 38.21-59.6Z" />
                                    <text fill="{{ $member->id % 4 == 0 ? '#ffffff' : '#181919' }}"
                                        font-family="Brandon Text" font-size="52.18" font-weight="800"
                                        transform="rotate(-13.45 556.845 -104.29)">ciao!</text>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" x="0"
                                    y="0" enable-background="new 0 0 192.9 201.6" version="1.1"
                                    viewBox="0 0 192.9 201.6"
                                    class="{{ $member->id % 3 == 0 ? 'text-teal' : 'text-yellow' }} absolute right-[15%] top-8 h-auto w-16 lg:w-20">
                                    <path fill="currentColor"
                                        d="M41.7 165.5c1.3 9.8.9 18.4-3.4 22.4-12.4 11.9 9.2 25.2 49.5-3.1 9.4 1.1 18.9 1 28.3-.5 26.7-3.9 47.3-15.5 61.8-35 14.6-19.5 18.5-42.3 11.8-68.6-6.6-26.3-21.3-47-43.9-62.3S98.6-2.7 72.2 1.1C45.7 5 25.9 16.8 12.9 36.6-.2 56.3-3.3 79.5 3.4 105.9c6.5 25.1 19.2 45 38.3 59.6z" />
                                    <text fill="{{ $member->id % 3 == 0 ? '#ffffff' : '#181919' }}"
                                        font-family="BrandonText-Black" font-size="52.18"
                                        transform="rotate(-13.45 556.837 -104.29)">ciao!</text>
                                </svg>
                            @endif
                        </div>
                        <button
                            class="absolute right-2 top-2 block w-10 rounded-full before:fixed before:inset-0 before:-z-10 focus:outline-none lg:right-4 lg:top-4"
                            @click.stop="$refs.modal_user_{{ $member->id }}.close(); console.log('closing dialog {{ $member->id }}');"
                            aria-label="Close modal window">@svg('plus', ' rotate-45 stroke-3 rounded-full border-black  text-black border-[3px] p-2  w-10 h-10')</button>
                        <div class="relative">
                            <svg class="absolute bottom-full right-0 h-auto w-full translate-x-[60%] translate-y-1/4"
                                xmlns="http://www.w3.org/2000/svg" width="307.32" height="119.97"
                                class="absolute -bottom-8 -right-16 h-auto w-4/5 lg:-bottom-16"
                                viewBox="0 0 307.32 119.97">
                                <path fill="none" stroke="#ffce00" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="3.84"
                                    d="M305.41 47.18c-6.87-16.81-14.11-30.1-32-27.06-12.45 2.11-20.67 13.64-28.15 23.81s-17.64 20.85-30.23 19.92c-16.61-1.22-24.23-20.48-34.41-33.65-21.37-27.65-52.76-41.63-69.2-10.8-10.27 19.26-5 30.16-1.65 64.95 0 0 8.56 64.19-56.91 15.41C37.02 88.2 43.44 63.38 55 72.37s-40.57 37.52-53.07-5.14">
                                </path>
                            </svg>
                            <div class="bg-beige bg-opacity-50 p-6 lg:p-12">

                                <h2 class="type-xl">{{ $member->name }}
                                </h2>

                                <div class="emphasise-first prose">{!! $member->biography !!}</div>
                            </div>

                        </div>
                    </form>
                </dialog>
            </div>
        @endforeach
    </div>
</div>
