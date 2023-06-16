<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Select;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Trin4ik\NovaSwitcher\NovaSwitcher;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class ImagePair extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "image-pair";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Image (x2)";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    protected $casts = [
        "image" => \App\Casts\NovaMediaLibraryCast::class,
        "secondary_image" => \App\Casts\NovaMediaLibraryCast::class,
    ];

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            MediaHubField::make("Image"),
            MediaHubField::make("Image 2", "secondary_image"),
            Select::make("Background colour")->options([
                "" => "None",
                "teal" => "Teal",
                "lilac" => "Lilac",
                "red" => "Red",
                "gray" => "Grey",
            ]),
            NovaSwitcher::make("Lift?"),
        ];
    }
}
