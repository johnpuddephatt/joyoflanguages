<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Heading;

class Newsletter extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "newsletter";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Newsletter";

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
            Text::make("Title"),
            Textarea::make("Description")
                ->maxLength(250)
                ->enforceMaxLength(),
            Text::make("Placeholder"),
            Text::make("Form action"),
            Text::make("Button text"),
            Text::make("Sticker", "sticker")->help("Leave blank to hide"),
            Heading::make("Pop-up settings"),
            Image::make("Image", "popup_image")


        ];
    }
}
