<?php

namespace App\Nova\Flexible\Layouts\Sublayouts;

use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
// use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use NormanHuth\Values\Values;
use Whitecube\NovaFlexibleContent\Flexible;
use App\Nova\Actions\SaveAndResizeImage48x48;

class Review extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "review";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Review";

    protected $preview = true;

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make("Name")->stacked()->maxlength(16)->enforceMaxlength(),
            Text::make("Title")->stacked()->maxLength(16)->enforceMaxlength(),
            Textarea::make("Review")
                ->help("Supports Markdown")
                ->stacked()->maxlength(250)->enforceMaxlength(),
            Image::make("Image")->store(new SaveAndResizeImage48x48())->stacked(),

        ];
    }

    public function getModulesAttribute()
    {
        return $this->flexible("modules", [
            "module" => \App\Nova\Flexible\Layouts\Sublayouts\Module::class,
        ]);
    }
}
