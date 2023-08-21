<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Whitecube\NovaFlexibleContent\Flexible;

class PageHero extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "page-hero";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Page hero";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    public static $imageSizes = [
        "image" => "landscape",
    ];

    public static $videoSizes = [
        "video" => [250, 530],
    ];

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make("Short title", "pretitle")
                ->maxLength(30)
                ->enforceMaxLength(),
            Textarea::make("Title")
                ->maxLength(65)
                ->enforceMaxLength()
                ->rows(2)
                ->help("Supports line breaks"),
            Textarea::make("Description")
                ->rows(2)
                ->maxLength(250)
                ->enforceMaxLength()
                ->help("Supports Markdown"),
            Image::make("Image")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return isset($value->image)
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                }),

            Text::make("Button text")->nullable(),
            Text::make("Button URL")->nullable(),
            Text::make("Video embed URL", "video_embed_url"),

            Boolean::make("Show squiggles", "show_squiggles")->default(true),
            Boolean::make("Show shape 1", "show_shape_1")->default(true),
            Boolean::make("Show shape 2", "show_shape_2")->default(true),
            Boolean::make("Show shape 3", "show_shape_3")->default(true),
        ];
    }
}
