<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;

class Hero extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "hero";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Hero";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    public static $imageSizes = [
        "image" => "uncropped",
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
            Text::make("Button text")->nullable(),
            Text::make("Button URL")->nullable(),
            \Trin4ik\NovaSwitcher\NovaSwitcher::make(
                "Show shapes?",
                "show_shapes"
            ),

            Select::make("Background colour")->options([
                "bg-white" => "White",
                "bg-teal" => "Teal",
                "bg-light-teal" => "Light teal",
                "bg-blue" => "Blue",
                "bg-beige" => "Beige",
            ]),
        ];
    }
}
