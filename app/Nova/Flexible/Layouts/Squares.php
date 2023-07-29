<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\KeyValue;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Number;

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
        return [
            KeyValue::make("Squares")

                ->keyLabel("Title")
                ->valueLabel("Description"),
        ];
    }
}
