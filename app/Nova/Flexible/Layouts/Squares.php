<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\KeyValue;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Text;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;

class Squares extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "squares";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Squares";

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
        return array_merge(
            (new \App\Nova\Flexible\Layouts\TextWithImage())->fields(),
            [
                SimpleRepeatable::make("Squares", "squares", [
                    Text::make("Title")->stacked(),
                    Textarea::make("Description")
                        ->rows(2)
                        ->stacked(),
                ]),
                Text::make("Sticker"),
                Text::make("Addendum")->help(
                    "**Bold** text will appear as a badge"
                ),
            ]
        );
    }
}
