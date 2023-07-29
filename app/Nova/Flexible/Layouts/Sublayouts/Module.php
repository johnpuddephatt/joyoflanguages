<?php
namespace App\Nova\Flexible\Layouts\Sublayouts;

use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
// use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use NormanHuth\Values\Values;
use Whitecube\NovaFlexibleContent\Flexible;

class Module extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "module";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Module";

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
        ];
    }
}
