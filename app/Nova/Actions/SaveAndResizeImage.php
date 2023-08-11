<?php
namespace App\Nova\Actions;

use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class SaveAndResizeImage
{
    /**
     * Store the incoming file upload.
     */
    public function __invoke(
        NovaRequest $request,
        $model,
        $attribute,
        $requestAttribute,
        $disk,
        $storagePath
    ) {
        $conversions = config("images." . $model::$imageSizes[$attribute]);

        $storagePath =
            $storagePath == "/"
                ? "images/page/" .
                    request()->resourceId .
                    "/" .
                    $attribute .
                    "/"
                : $storagePath;

        $sizes_paths = [];

        if (!str_contains($storagePath, "temporary_flexible_uploads")) {
            $sizes_paths = $this->createConversions(
                $conversions["sizes"],
                $storagePath,
                $request,
                $requestAttribute,
                $disk
            );
        }

        // Default
        if (isset($sizes_paths[$conversions["DEFAULT"][0] . "w"])) {
            $default_path = $sizes_paths[$conversions["DEFAULT"][0] . "w"];
        } else {
            $default_path =
                $storagePath . $request->$requestAttribute->hashName();
            Storage::disk($disk)->put(
                $default_path,
                InterventionImage::make($request->$requestAttribute)
                    ->{$conversions["DEFAULT"][1] ? "fit" : "widen"}(
                        $conversions["DEFAULT"][0],
                        $conversions["DEFAULT"][1]
                    )
                    ->encode($request->$requestAttribute->extension(), 75)
            );
        }

        return (object) [
            "image" => $default_path,
            "conversions" => (object) $sizes_paths,
        ];
    }

    public function createConversions(
        $sizes,
        $storagePath,
        $request,
        $requestAttribute,
        $disk
    ) {
        $sizes_paths = [];

        foreach ($sizes as $key => $size) {
            if ($key == "DEFAULT") {
                continue;
            }

            $sizes_paths[$size[0] . "w"] =
                $storagePath .
                $request->$requestAttribute->hashName() .
                "__" .
                $size[0] .
                "w" .
                ".jpg";

            Storage::disk($disk)->put(
                $sizes_paths[$size[0] . "w"],
                InterventionImage::make($request->$requestAttribute)
                    ->{$size[1] ? "fit" : "widen"}($size[0], $size[1])
                    ->encode("jpg", 75)
            );
        }

        return $sizes_paths;
    }
}
