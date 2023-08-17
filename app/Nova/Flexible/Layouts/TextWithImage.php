<?php

namespace App\Nova\Flexible\Layouts;

use App\Casts\MyFlexibleCast;
use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Trin4ik\NovaSwitcher\NovaSwitcher;
use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextWithImage extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "text-with-image";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Text With Image";

    /**
     * Enable preview for this layout
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
            Text::make("Title")->stacked(),

            Textarea::make("Text")

                ->help("Supports Markdown")
                ->stacked(),

            MediaHubField::make("Image", "image")->stacked(),

            NovaSwitcher::make("Reverse")->stacked(),

            Select::make("Squiggle?", "squiggle")
                ->options([
                    null => "Disabled",
                    1 => "Squiggle 1",
                    2 => "Squiggle 2",
                ])
                ->stacked(),

            Select::make("Background colour")
                ->options([
                    "" => "White",
                    "bg-opacity-30 bg-pink" => "Pink",
                    "bg-beige bg-opacity-50" => "Beige",
                ])
                ->stacked(),
        ];
    }
}
