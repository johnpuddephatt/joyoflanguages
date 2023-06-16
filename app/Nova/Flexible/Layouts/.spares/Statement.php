<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class Statement extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "statement";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Statement";

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
        return [Textarea::make("Statement")->rows(3)];
    }
}
