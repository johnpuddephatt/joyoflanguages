<div
    class="relative flex h-[150vh] flex-col items-center justify-center overflow-hidden bg-white lg:h-screen lg:flex-row">

    <div class="container relative z-10 mx-auto w-full max-w-7xl">
        <div class="mt-16 lg:w-1/2">
            <h1 class="mb-6 text-4xl font-bold lg:text-5xl">{!! nl2br($layout->title) !!}</h1>
            <p class="max-w-xl lg:text-lg">{!! nl2br($layout->subtitle) !!}</p>
            <x-button class="mt-6 text-lg" href="/">Sign up</x-button>
        </div>
    </div>

    <div class="inset-0 mt-8 flex translate-x-8 flex-row items-end lg:absolute lg:mt-0 lg:ml-auto lg:h-full lg:w-1/2">

        <div class="absolute top-1/2 right-0 -z-10 w-[50%] -translate-y-1/2">
            <div class="tk-blob" style="--time: 40s; --amount: 5;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 341.4 374.7">
                    <path fill="#ffd800"
                        d="M309.9 70.6c37.8 52.7 39.8 128.7 15.4 184.1-24.3 55.4-75 90.1-125.4 107.4-50.4 17.4-100.4 17.4-136.2-3.3-35.7-20.7-57.2-62-62.4-102.1-5.2-40.2 5.8-79 29.1-128.3C53.6 79.1 89.1 19.3 143.7 4.1 198.3-11.2 272 18 309.9 70.6z">
                    </path>
                </svg>
            </div>
        </div>
        <svg class="block aspect-square h-auto w-full lg:max-h-[85%] lg:translate-y-16"
            xmlns="http://www.w3.org/2000/svg" width="1172.89" height="1107.97" viewBox="0 0 1172.89 1107.97">
            <defs>
                <style>
                    .prefix__cls-70 {
                        stroke: #12171e;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        fill: none;
                        stroke-width: 3.65px
                    }

                    .blur {
                        filter: blur(5px);
                    }
                </style>
            </defs>

            <foreignObject x="290" y="30" width="380" height="900"
                requiredFeatures="http://www.w3.org/TR/SVG11/feature#Extensibility">
                <x-responsive-image class="h-[43rem] w-full object-cover" :image="$layout->image" />

            </foreignObject>
            <path fill="#f6b16b"
                d="M402.48 994.89c1.3 3.4 2.5 6.82 3.67 10.26 22.75 66.81 198.37 149.37 292.64 70.79 55.24-46 96.65-79.23 89.47-173.34-3.39-44.42-42.75-142.75-160.84-161.58 0 0-158.89-36-226.24 101.8-29.59 60.55-6.61 131.41 1.3 152.07Z" />
            <!-- <path fill="#ffd800"
                d="M1172.79 512.22c-.15-6-.13-12-.06-18 1.44-116.81-226.83-342.67-417.3-272.2-111.61 41.28-194.55 70.16-235.37 220.91-19.27 71.15-12.23 246.27 161.55 340.92 0 0 227.92 144 409.13-33.72 79.63-78.09 82.95-201.31 82.05-237.91Z" /> -->
            <path fill="#629ce4"
                d="M19.76 350.8c1.61 4.2 3.1 8.44 4.55 12.7 28.12 82.65 245.44 184.81 362.12 87.59 68.35-57 119.59-98 110.71-214.48-4.19-55-52.9-176.62-199-199.92 0 0-196.6-44.57-279.92 126-36.67 74.86-8.23 162.55 1.54 188.11Z" />
            <path class="blur"
                d="M676.61 845.38h.08Zm-19.8-816.14H358.49a55.76 55.76 0 0 0-55.76 55.75v715.56a55.76 55.76 0 0 0 55.76 55.74h298.32a55.75 55.75 0 0 0 55.75-55.74V84.99a55.75 55.75 0 0 0-55.75-55.75Z"
                opacity=".1" />
            <path fill="#fff" stroke="#12171e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.55"
                d="M645.43 1.27H329a45.8 45.8 0 0 0-45.66 45.66v744.68A45.8 45.8 0 0 0 329 837.28h316.43a45.8 45.8 0 0 0 45.67-45.67V46.93a45.8 45.8 0 0 0-45.67-45.66Zm18.56 774.61a30 30 0 0 1-27.51 29.78h-303.1a30 30 0 0 1-27.51-29.78V60.3a29.89 29.89 0 0 1 27.91-29.82H378.81a5 5 0 0 1 4.7 4.46V35.51a23.78 23.78 0 0 0 23.75 22.65h155.29a23.78 23.78 0 0 0 23.75-22.65V34.94a5 5 0 0 1 4.7-4.46h45.04a29.89 29.89 0 0 1 27.9 29.82Z" />
            <circle cx="466.69" cy="34.14" r="11.27" fill="#4badb8" stroke="#0a0a0a" stroke-miterlimit="10"
                stroke-width="2.54" />
            <circle cx="503.16" cy="34.14" r="11.27" fill="#ffd800" stroke="#0a0a0a" stroke-miterlimit="10"
                stroke-width="2.54" />
            <path fill="#f3b5ba"
                d="M316.15 455.55c-.83-2-1.61-4.13-2.37-6.21-14.74-40.49-123-88.64-179.54-39.47-33.13 28.82-58 49.61-52.4 107 2.64 27.07 27.93 86.59 100.26 96.57 0 0 97.45 19.95 136.79-65 17.29-37.41 2.35-80.37-2.74-92.89Z" />
            <path
                d="M239.62 637.2s11.7-28.79 19.49-54.27 2.4-61.76-9-98.64-10.9-35.47-1.62-74.06c5.09-21.16 28.3-46.44 1-46.14s-44.06 79.73-44.06 79.73-.15 5.39-2.62 5.69-46.6-20-63-10.79c-8.34 4.65-19.49 24.89 14.09 39s39.87 1.5 39.57-11.4-33.88-15-33.88-15"
                class="prefix__cls-70" />
            <path d="M133.67 462.55S119.4 461.2 120 475.29s23.38 36 65.66 34.18c17.16-1.8 18.24-19.51 2.07-28.19"
                class="prefix__cls-70" />
            <path d="M128.62 491.55s-14.62 5.53-5.92 18 18.59 25.68 57.86 17.58c8.69-3 12.29-9.59 5.1-17.68"
                class="prefix__cls-70" />
            <path
                d="M127.43 515.95s-14 2.82-11 15.41 18.29 18.29 41.67 16.19 14.63-19 14.63-19M135.89 547.98s.9 12.16 43.17 11.86c15.59-1.49 20.83 6 20.16 21.89s-13.26 35.38-13.26 35.38"
                class="prefix__cls-70" />
        </svg>

    </div>

    <!-- top right turquoise circle -->
    <svg class="absolute top-0 right-0 hidden w-[20vw] translate-x-1/3 -translate-y-1/3 transform lg:block"
        xmlns="http://www.w3.org/2000/svg" width="565.69" height="539.98" viewBox="0 0 565.69 539.98">
        <path fill="#4badb8"
            d="M565.6 260.08c-.13-5.15-.12-10.3-.05-15.45 1.23-100-194.35-293.55-357.54-233.19-95.62 35.37-166.7 60.11-201.7 189.27-16.51 61-10.47 211 138.42 292.09 0 0 195.27 123.38 350.53-28.88 68.26-66.91 71.11-172.49 70.34-203.84Z" />
    </svg>

    <!-- bottom left turquoise circle -->
    <!--<svg class="absolute bottom-0 left-0 hidden w-96 -translate-x-1/2 translate-y-1/2 transform lg:block"
        xmlns="http://www.w3.org/2000/svg" width="573.42" height="523.4" viewBox="0 0 573.42 523.4">
        <path fill="#4badb8"
            d="M525.4 111.61c-2.68-4.39-5.23-8.86-7.75-13.36-48.86-87.31-314.91-157.39-426.2-23.64C26.23 152.98-23 209.89 11.15 339.27c16.12 61.06 96.23 188.07 265.72 184 0 0 230.79 9.46 289.35-200 25.73-91.96-24.49-184.87-40.82-211.66Z" />
        </svg>-->

    <div class="absolute bottom-0 left-0 hidden -translate-x-1/3 translate-y-1/3 transform lg:block">
        <div class="tk-blob w-[20vw] text-light-teal" style="--time: 40s; --amount: 5;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 747.2 726.7">
                <path fill="currentColor"
                    d="M539.8 137.6c98.3 69 183.5 124 203 198.4 19.3 74.4-27.1 168.2-93.8 245-66.8 76.8-153.8 136.6-254.2 144.9-100.6 8.2-214.7-35.1-292.7-122.5S-18.1 384.1 7.4 259.8C33 135.6 126.3 19 228.5 2.2c102.1-16.8 213.2 66.3 311.3 135.4z">
                </path>
            </svg>
        </div>
    </div>

</div>
