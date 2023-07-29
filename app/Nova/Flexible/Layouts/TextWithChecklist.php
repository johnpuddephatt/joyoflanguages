<?php
namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
// use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use NormanHuth\Values\Values;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;
use Whitecube\NovaFlexibleContent\Flexible;

class TextWithChecklist extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "text-with-checklist";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Text with checklist";

    protected $preview = true;

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            MediaHubField::make("Image")->stacked(),
            Text::make("Title")->stacked(),
            Textarea::make("Description")
                ->help("Supports Markdown")
                ->stacked(),
            SimpleRepeatable::make("Checklist", "checklist", [
                Text::make("Title")->stacked(),
                Textarea::make("Description")
                    ->help("Supports Markdown")
                    ->stacked(),
            ]),
        ];
    }
}
