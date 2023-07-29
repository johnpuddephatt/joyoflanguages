<?php

namespace App\Nova\Flexible\Layouts;

use Advoor\NovaEditorJs\NovaEditorJsField;
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
            Text::make("Pre-title", "pre_title")->hideFromIndex(),
            Text::make("Title", "title")->hideFromIndex(),

            Textarea::make("Intro")
                ->help("Accepts Markdown")
                ->stacked(),

            SimpleRepeatable::make("Quotes", "quotes", [
                Textarea::make("Quote", "quote")
                    ->stacked()
                    ->help("Accepts Markdown"),
            ]),

            Textarea::make("Outro")
                ->help("Accepts Markdown")
                ->stacked(),
        ];
    }
}
