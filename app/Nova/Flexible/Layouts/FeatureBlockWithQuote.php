<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Manogi\Tiptap\Tiptap;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Illuminate\Support\Facades\Storage;

class FeatureBlockWithQuote extends Layout
{
    public $preview = true;
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "feature-block-with-quote";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Feature block (with quote)";

    public static $imageSizes = [
        "main_image" => "landscape",
        "phone_image_1" => "wide",
        "phone_image_2" => "wide",
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
            Image::make("Image", "main_image")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return isset($value->image)
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                })
                ->stacked(),
            Text::make("Title")->stacked(),
            Tiptap::make("Description")
                ->buttons(["bold", "italic", "link", "blockquote"])
                ->withMeta([
                    "extraAttributes" => [
                        "placeholder" => "Start writing...",
                    ],
                ])
                ->stacked(),
            Text::make("Button URL")->stacked(),
            Text::make("Button text")->stacked(),

            Heading::make("Quote"),

            Textarea::make("Quote"),

            Text::make("Quote author"),

            Image::make("Quote image")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                }),

            Image::make("Phone image 1", "phone_image_1")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                }),

            Image::make("Phone image 2", "phone_image_2")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                }),
        ];
    }
}
