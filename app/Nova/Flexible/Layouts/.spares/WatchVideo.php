<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Fields\Select;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;

class WatchVideo extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "watch-video";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Watch video";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    protected $casts = [
        "image" => \App\Casts\NovaMediaLibraryCast::class,
    ];

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            MediaHubField::make("Image", "image"),
            Text::make("Pretitle")->default("Short title (optional)"),
            Text::make("Title")->default("Video title"),
            Text::make("Subtitle")->default("e.g. year"),
            Textarea::make("Badge")->rows(2),
            URL::make("Link"),
            Select::make("Colour")
                ->options([
                    "teal" => "Teal",
                    "red" => "Red & black",
                ])
                ->default("teal"),
        ];
    }
}
