<div class="{{ $layout->background_colour ?? null }} border-b-[3px] pt-16 text-center lg:border-b-4">
    @if ($layout->title)
        <h3 class="text-2xl font-bold lg:text-3xl">{{ $layout->title }}</h2>
    @endif

    <x-button-link target="{{ $layout->new_tab ? '_parent' : null }}" href="{{ $layout->button_link }}"
        class="{{ $layout->background_colour == 'bg-yellow' ? '!bg-light-teal' : 'bg-yellow' }} relative z-10 w-full max-w-xs translate-y-[calc(50%-1px)] text-xl shadow-transparent lg:max-w-sm lg:translate-y-[calc(50%-2px)] lg:!border-4 lg:text-2xl">{{ $layout->button_text ?? 'Sign up now!' }}</x-button-link>
</div>
