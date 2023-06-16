<button
    {{ $attributes->class('font-bold relative inline-block rounded-full border-[3px] bg-white active:after:translate-x-0 active:after:translate-y-0 px-12 py-2 text-black after:transition hover:after:translate-x-1.5 hover:after:translate-y-1.5 after:absolute after:inset-0 after:-z-10 after:translate-y-2 after:translate-x-2 after:rounded-full after:bg-yellow') }}>{!! $slot !!}</button>
