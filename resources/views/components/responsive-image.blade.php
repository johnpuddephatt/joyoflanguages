@props(['image'])

@if (isset($image))
    <img {{ $attributes->class(['block']) }} src="{{ Storage::url($image->image) }}"
        srcset="
@foreach ((array) $image->conversions as $key => $value)
    {{ Storage::url($value) }} {{ $key }}{{ $loop->last ? null : ', ' }} @endforeach"
        onload="window.requestAnimationFrame(function(){if(!(size=getBoundingClientRect().width))return;onload=null;sizes=Math.ceil(size/window.innerWidth*100)+'vw';});"
        sizes="1px" />
@endif
