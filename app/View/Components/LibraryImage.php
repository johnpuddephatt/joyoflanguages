<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class LibraryImage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $image = null, public $conversion = null)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (is_object($this->image)) {
            return view("components.library-image");
        } elseif (is_numeric($this->image)) {
            $this->image = \Outl1ne\NovaMediaHub\Models\Media::find(
                $this->image
            );
            return view("components.library-image");
        }
    }

    public function getSrc($conversion = null)
    {
        return Storage::disk($this->image->disk)->url(
            config("nova-media-hub.path_prefix") .
                $this->getImageConversionPath(
                    $this->image,
                    $conversion ?? $this->conversion
                )
        );
    }

    public function getImageConversionPath($image, $conversion)
    {
        if (isset($image->conversions[$conversion])) {
            return "/{$image->id}/conversions/{$image->conversions[$conversion]}";
        } else {
            return "/{$image->id}/{$image->file_name}";
        }
    }

    public function getSrcSet()
    {
        $conversions = \Illuminate\Support\Arr::where(
            $this->image->conversions,
            fn($value, $key) => str_starts_with($key, $this->conversion . "__")
        );

        $configs =
            (config("nova-media-hub.image_conversions.*") ?? []) +
            (config(
                "nova-media-hub.image_conversions." .
                    $this->image->collection_name
            ) ??
                []);

        $output = [];

        foreach ($conversions as $conversion => $path) {
            $output[$configs[$conversion]["width"]] = $this->getSrc(
                $conversion
            );
        }

        krsort($output);

        $str = "";

        foreach ($output as $width => $url) {
            $str .= "{$url} {$width}w,";
        }

        if ($str) {
            $str .=
                "data:image/svg+xml;base64," .
                base64_encode(
                    Blade::render(
                        '
                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0"
                        y="0" viewBox="0 0 {{ $width }} {{ $height }}">
                    </svg>
                ',
                        [
                            "width" => $configs[$this->conversion]["width"],
                            "height" => $configs[$this->conversion]["height"],
                        ]
                    )
                ) .
                " 32w";
        }

        // $str = rtrim($str, ",");

        return $str;
    }
}
