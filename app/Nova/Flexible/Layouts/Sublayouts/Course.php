<?php
namespace App\Nova\Flexible\Layouts\Sublayouts;

use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
// use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use NormanHuth\Values\Values;
use Whitecube\NovaFlexibleContent\Flexible;

class Course extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "course";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Course";

    protected $preview = true;

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Number::make("Number")->stacked(),
            Text::make("Title")->stacked(),
            Textarea::make("Description")
                ->help("Supports Markdown")
                ->stacked(),
            Flexible::make("Modules")
                ->addLayout(\App\Nova\Flexible\Layouts\Sublayouts\Module::class)
                ->stacked()
                ->button("Add Module"),
        ];
    }

    public function getModulesAttribute()
    {
        return $this->flexible("modules", [
            "module" => \App\Nova\Flexible\Layouts\Sublayouts\Module::class,
        ]);
    }
}
