<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Boolean;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;

class Subscriptions extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "subscriptions";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Subscriptions";

    protected $preview = true;

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make("Pre-title", "pre_title"),
            Text::make("Title", "title"),
            Text::make("Intro", "intro"),
            SimpleRepeatable::make("Subscriptions", "subscriptions", [
                Text::make("Pre-title", "pre_title"),
                Text::make("Title", "title"),
                Text::make("Sticker", "sticker"),
                Text::make("Price", "price"),
                Textarea::make("Description")
                    ->help("Accepts Markdown")
                    ->stacked(),
                Text::make("URL", "url"),
            ]),
            Textarea::make("Outro")
                ->help("Accepts Markdown")
                ->stacked(),
            Boolean::make("Show in menu"),
            Boolean::make("Show as button"),
        ];
    }
}
