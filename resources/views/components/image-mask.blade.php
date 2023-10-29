<svg style="width:0;height:0; position:absolute;" xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink" width="500" height="500"
    viewBox="0 0 500 500" ">
    <defs>
        <clipPath id="clip-path" clipPathUnits="objectBoundingBox">
            <path fill="none"
                d="M0.096,0.142 C0.177,0.049,0.323,0,0.426,0 C0.565,0,0.709,0.024,0.817,0.116 C0.947,0.227,0.99,0.374,0.995,0.468 C1,0.609,0.957,0.728,0.869,0.819 S0.666,0.955,0.526,0.957 A0.553,0.556,0,0,1,0.38,0.94 C0.153,1,0.051,0.974,0.123,0.921 C0.147,0.903,0.156,0.859,0.156,0.808 Q0.024,0.675,0,0.473 C-0.017,0.331,0.016,0.236,0.096,0.142"" />
</clipPath>
</defs>

</svg>

<div {{ $attributes }}>
    <div style="clip-path:url(#clip-path)">
        {!! $slot !!}
    </div>
</div>
