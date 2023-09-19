<form action="{!! $url !!}" {!! $attributes !!}>
    @csrf
    <button type="submit" class="{!! $basename !!}__link !border-teal-light !bg-teal">
        <span class="{!! $basename !!}__label">{{ $label }}</span>
    </button>
</form>
