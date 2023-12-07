<div id="{{ $layout ? $layout->key() : null }}"
    class="{{ $layout->background_colour ?? null }} border-b-[3px] pt-8 text-center lg:border-b-4 2xl:pt-16">
    @if ($layout->title)
        <h3 class="type-sm !-mb-2">{{ $layout->title }}</h2>
    @endif

    <x-button-link target="{{ $layout->new_tab ? '_parent' : null }}" href="{{ $layout->button_link }}"
        class="{{ $layout->background_colour == 'bg-yellow' ? '!bg-light-teal' : 'bg-yellow' }} type-sm relative z-10 !m-0 w-full max-w-xs translate-y-[calc(50%-1px)] shadow-transparent lg:max-w-sm lg:translate-y-[calc(50%-2px)] lg:!border-4">{{ $layout->button_text ?? 'Sign up now!' }}</x-button-link>
</div>
