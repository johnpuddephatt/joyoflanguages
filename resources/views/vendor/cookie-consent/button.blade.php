<form action="{!! $url !!}" {!! $attributes !!}>
    @csrf
    <button type="submit"
        class="{!! $basename !!}__link w-full max-w-sm rounded !border-light-teal !bg-teal px-2 py-2 text-sm font-semibold text-white">
        <span class="{!! $basename !!}__label">{{ $label }}</span>
    </button>
</form>
