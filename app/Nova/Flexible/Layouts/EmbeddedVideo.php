<?php
namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;

class EmbeddedVideo extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "embedded-video";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Embedded video";

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
        return [Text::make("Video embed code"), Text::make("Sticker")];
    }
}