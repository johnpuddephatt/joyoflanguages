<?php

namespace App\Nova\Flexible\Layouts;

use Advoor\NovaEditorJs\NovaEditorJsField;
use Laravel\Nova\Fields\Boolean;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;
use Whitecube\NovaFlexibleContent\Flexible;

class Faqs extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "faqs";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Frequently asked questions";

    protected $preview = true;

    // public function getFaqsAttribute()
    // {
    //     return $this->flexible("faqs", [
    //         "single-faq" =>
    //             \App\Nova\Flexible\Layouts\Sublayouts\SingleFaq::class,
    //     ]);
    // }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make("Pre-title", "pre_title")
                ->default("Information & FAQs")
                ->hideFromIndex(),
            Text::make("Title", "title")
                ->default("Information & FAQs")
                ->hideFromIndex(),

            // Flexible::make("FAQs", "faqs")
            //     ->addLayout(
            //         \App\Nova\Flexible\Layouts\Sublayouts\SingleFaq::class
            //     )
            //     ->button("Add a question"),

            SimpleRepeatable::make("FAQs", "faqs", [
                Text::make("Question", "question")->stacked(),
                Textarea::make("Answer", "answer")
                    ->stacked()
                    ->help("Accepts Markdown"),
            ]),
            Boolean::make("Show in menu"),
            Number::make("Number shown"),
        ];
    }
}
