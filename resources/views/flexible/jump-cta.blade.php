<div class="py-16 text-center">
    @if ($layout->title)
        <h3 class="mb-6 text-2xl font-bold text-light-teal">{{ $layout->title }}</h2>
    @endif

    <x-button-link target="{{ $layout->new_tab ? '_parent' : null }}" href="{{ $layout->button_link }}"
        class="relative w-full max-w-sm bg-yellow shadow-transparent after:absolute after:left-1/2 after:top-1/2 after:-z-10 after:block after:h-[3px] after:w-screen after:-translate-x-1/2 after:bg-black">{{ $layout->button_text ?? 'Sign up now' }}</x-button-link>
</div>
