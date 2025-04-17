<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Textarea;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;
use Whitecube\NovaFlexibleContent\Flexible;

class Reviews extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "reviews";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Reviews";

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

            Flexible::make("Reviews")
                ->addLayout(\App\Nova\Flexible\Layouts\Sublayouts\Review::class)
                ->stacked()
                ->collapsed()
                ->button("Add Review"),


        ];
    }

    public function getReviewsAttribute()
    {
        return $this->flexible("reviews", [
            "review" => \App\Nova\Flexible\Layouts\Sublayouts\Review::class,
        ]);
    }
}
