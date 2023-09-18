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
            Text::make("Short title", "pre_title"),
            Text::make("Title", "title"),
            Text::make("Intro", "intro"),
            SimpleRepeatable::make("Subscriptions", "subscriptions", [
                Text::make("Short title", "pre_title")->stacked(),
                Text::make("Title", "title")->stacked(),
                Text::make("Sticker", "sticker")->stacked(),
                Text::make("Price", "price")->stacked(),
                Textarea::make("Description")
                    ->help("Accepts Markdown")
                    ->stacked(),
                Text::make("URL", "url")->stacked(),
            ]),
            Textarea::make("Small print")
                ->help("Accepts Markdown")
                ->stacked(),
            Textarea::make("Outro")
                ->help("Accepts Markdown")
                ->stacked(),
            Boolean::make("Show in menu"),
            Boolean::make("Show as button"),
        ];
    }
}
