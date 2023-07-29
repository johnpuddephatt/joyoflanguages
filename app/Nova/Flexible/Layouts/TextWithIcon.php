<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;

use Trin4ik\NovaSwitcher\NovaSwitcher;

use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextWithIcon extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "text-with-icon";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Text With Icon";

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
            NovaSwitcher::make("Reverse")->stacked(),

            Text::make("Title")->stacked(),

            Textarea::make("Main")
                ->help("Supports Markdown")
                ->stacked(),

            Image::make("Image")
                ->stacked()
                ->acceptedTypes(".svg"),
        ];
    }
}
