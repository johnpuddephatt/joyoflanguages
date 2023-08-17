<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class Quote extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "quote";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Quote with image";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    public static $imageSizes = [
        "quote_image" => "square",
    ];

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Select::make("Background colour", "background_colour")
                ->options([
                    "" => "None",
                    "bg-beige" => "Beige",
                    "bg-yellow" => "Yellow",
                    "bg-pink bg-opacity-30" => "Pink",
                ])
                ->stacked(),

            Boolean::make("Large?", "large")->stacked(),

            Textarea::make("Quote")->stacked(),

            Text::make("Quote author")->stacked(),

            Image::make("Quote image")
                ->stacked()
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                }),
        ];
    }
}
