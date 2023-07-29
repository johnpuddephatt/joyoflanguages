<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="500" height="500"
    viewBox="0 0 500 500" {{ $attributes }}">
    <defs>
        <clipPath id="clip-path">
            <path fill="none"
                d="M50.46,73.53C90.83,27.18,163.54,3,215,2.92c69.33,0,141.15,12,195.28,57.69,64.86,54.78,86,128,88.56,174.27,3.89,70.15-19,129.1-63,174.11s-101,67.88-171,68.6A276,276,0,0,1,192,469c-113.31,59-164.24,17.28-128.29-9,12.21-8.92,16.36-30.77,16.37-56.31Q14.17,337.58,2.35,237.48C-5.94,167.15,10.1,119.9,50.46,73.53Z" />
        </clipPath>
    </defs>
    <foreignObject clip-path="url(#clip-path)" x="0" y="0" width="500" height="500"
        requiredFeatures="http://www.w3.org/TR/SVG11/feature#Extensibility">
        {!! $slot !!}
    </foreignObject>
</svg>
