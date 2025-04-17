<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Textarea;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;
use Whitecube\NovaFlexibleContent\Flexible;

class VoiceOfCustomer extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "voice-of-customer";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Voice of customer";

    protected $preview = true;

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make("Short title", "pre_title")->hideFromIndex(),
            Text::make("Title", "title")->hideFromIndex(),

            Textarea::make("Intro")
                ->help("Accepts Markdown")
                ->rows(2)
                ->stacked(),

            SimpleRepeatable::make("Quotes", "quotes", [
                Textarea::make("Quote", "quote")
                    ->stacked()
                    ->rows(2)
                    ->help("Accepts Markdown"),
            ]),

            Textarea::make("Outro")
                ->help("Accepts Markdown")
                ->rows(3)
                ->stacked(),
        ];
    }
}
