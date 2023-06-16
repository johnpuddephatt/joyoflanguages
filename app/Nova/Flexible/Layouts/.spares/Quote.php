<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Select;
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
    protected $title = "Quote";

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
            Heading::make("Content"),
            Textarea::make("Quote")
                ->alwaysShow()
                ->default("My quote goes here..."),
            Text::make("Source")->default("Source name"),
            Heading::make("Settings"),
            Select::make("Text colour")->options([
                "teal" => "Teal",
                "lilac" => "Lilac",
                "red" => "Red",
                "gray" => "Grey",
                "white" => "White",
            ]),
            Select::make("Background colour")->options([
                "teal" => "Teal",
                "lilac" => "Lilac",
                "red" => "Red",
                "gray" => "Grey",
            ]),
            Select::make("Quote colour")->options([
                "teal" => "Teal",
                "lilac" => "Lilac",
                "red" => "Red",
                "gray" => "Grey",
                "white" => "White",
            ]),
        ];
    }
}
