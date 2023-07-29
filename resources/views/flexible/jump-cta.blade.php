<div class="container text-center">
    <h2 class="text-lg font-bold">{{ $layout->title }}</h2>

    <x-button-link target="{{ $layout->new_tab ? '_parent' : null }}" href="{{ $layout->button_link }}"
        class="shadow-white">{{ $layout->button_text }}</x-button-link>
</div>
