<?php
namespace App\Nova\Actions;

use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use FFMpeg;
use FFMpeg\Filters\Video\VideoFilters;

class SaveAndResizeVideo
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
        $conversion = $model::$videoSizes[$attribute] ?? [1280, 720];

        $storagePath =
            $storagePath == "/"
                ? "videos/" . request()->resourceId . "/" . $attribute . "/"
                : $storagePath;

        $webm_filename =
            $storagePath . $request->$requestAttribute->hashName() . ".webm";
        $mp4_filename =
            $storagePath . $request->$requestAttribute->hashName() . ".mp4";

        FFMpeg::open($request->$requestAttribute)
            ->export()
            ->toDisk($disk)
            ->addFilter(function ($filters) use ($conversion) {
                $filters->custom(
                    "scale=(iw*sar)*max({$conversion[0]}/(iw*sar)\,{$conversion[1]}/ih):ih*max({$conversion[0]}/(iw*sar)\,{$conversion[1]}/ih), crop={$conversion[0]}:{$conversion[1]}"
                );
            })
            ->inFormat((new \FFMpeg\Format\Video\WebM())->setKiloBitrate(900))
            ->save($webm_filename)

            ->export()
            ->toDisk($disk)
            ->addFilter(function ($filters) use ($conversion) {
                $filters->custom(
                    "scale=(iw*sar)*max({$conversion[0]}/(iw*sar)\,{$conversion[1]}/ih):ih*max({$conversion[0]}/(iw*sar)\,{$conversion[1]}/ih), crop={$conversion[0]}:{$conversion[1]}"
                );
            })
            ->inFormat((new \FFMpeg\Format\Video\X264())->setKiloBitrate(1200))
            ->save($mp4_filename);

        FFMpeg::cleanupTemporaryFiles();

        return [
            "video" => [
                "webm" => $webm_filename,
                "mp4" => $mp4_filename,
            ],
        ];
    }
}
