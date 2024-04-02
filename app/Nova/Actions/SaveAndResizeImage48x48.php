<?php

namespace App\Nova\Actions;

use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class SaveAndResizeImage48x48
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

        $storagePath =
            $storagePath == "/"
            ? "images/page/" .
            request()->resourceId .
            "/" .
            $attribute .
            "/"
            : $storagePath;

        $default_path =
            $storagePath . $request->$requestAttribute->hashName();
        Storage::disk($disk)->put(
            $default_path,
            InterventionImage::make($request->$requestAttribute)
                ->fit(
                    48,
                    48
                )
                ->encode($request->$requestAttribute->extension(), 75)
        );

        return $default_path;
    }
}
