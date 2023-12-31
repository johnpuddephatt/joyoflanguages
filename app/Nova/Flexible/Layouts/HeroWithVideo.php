<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use App\Nova\Actions\SaveAndResizeVideo;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Whitecube\NovaFlexibleContent\Flexible;

class HeroWithVideo extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "hero-with-video";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Hero with video";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    public static $imageSizes = [
        "image" => "portrait",
    ];

    public static $videoSizes = [
        "video" => [375, 795],
    ];

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Textarea::make("Title")->rows(2),
            Textarea::make("Subtitle")->alwaysShow(),

            Image::make("Image")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return isset($value->image)
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                }),

            File::make("Video", "video")
                ->store(new SaveAndResizeVideo())
                ->acceptedTypes(".mp4"),
            Boolean::make("Autoplay"),

            Text::make("Button URL"),
            Text::make("Button text"),
        ];
    }
}
