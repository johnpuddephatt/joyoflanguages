<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Image;
use Manogi\Tiptap\Tiptap;
use Trin4ik\NovaSwitcher\NovaSwitcher;

class FeatureBlock extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "feature-block";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Feature banner";

    public static $imageSizes = [
        "image" => "wide",
    ];

    /**
     * The preview Blade view for this layout
     *
     * @var string
     */
    protected $preview = true;

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            NovaSwitcher::make("Reverse")->stacked(),

            Image::make("Image")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return isset($value->image)
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                })
                ->stacked(),
            Text::make("Title")->stacked(),
            Text::make("Subtitle")->stacked(),
            Textarea::make("Description")
                ->maxLength(250)
                ->enforceMaxLength()
                ->help("Supports Markdown")
                ->stacked(),
            Text::make("Button URL")->stacked(),
            Text::make("Button text")->stacked(),
            Select::make("Colour")
                ->options([
                    "blue" => "Blue",
                    "light-teal" => "Teal",
                    "beige" => "Beige",
                ])
                ->stacked(),
            NovaSwitcher::make("Show sun?", "show_sun")->stacked(),
        ];
    }
}
