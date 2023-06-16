<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
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

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make("Pre-title", "pretitle"),
            Text::make("Title"),
            Textarea::make("Description"),
            Image::make("Image")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return isset($value->image)
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                }),
        ];
    }
}
