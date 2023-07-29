<?php
namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
// use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use NormanHuth\Values\Values;

class TextWithBullets extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "text-with-bullets";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Text with bullets";

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
            Textarea::make("Description")
                ->help("Supports Markdown")
                ->stacked(),

            Values::make("Bullets")
                ->valueLabel("")
                ->stacked(),
        ];
    }
}
