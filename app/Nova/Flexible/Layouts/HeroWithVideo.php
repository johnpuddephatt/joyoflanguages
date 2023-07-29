<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Image;
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
            Flexible::make("Images")
                ->button("Add image")
                ->limit(4)
                ->addLayout("Image", "Image", [
                    Image::make(null, "image")
                        ->store(new SaveAndResizeImage())
                        ->preview(function ($value, $disk) {
                            return isset($value->image)
                                ? Storage::disk($disk)->url($value->image)
                                : null;
                        })
                        ->stacked(),
                ]),
        ];
    }
}
