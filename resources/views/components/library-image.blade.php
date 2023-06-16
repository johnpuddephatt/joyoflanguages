<img {{ $attributes->class(['block']) }} src="{{ $getSrc($conversion) }}" srcset="{{ $getSrcSet() }}"
    onload="window.requestAnimationFrame(function(){if(!(size=getBoundingClientRect().width))return;onload=null;sizes=Math.ceil(size/window.innerWidth*100)+'vw';});"
    sizes="1px" />
