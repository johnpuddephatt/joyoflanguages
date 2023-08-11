<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Fields\Text;

class LanguagesPostsLinks extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "languages-posts-links";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Languages posts links";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    // Define your accessors here
    // public function getPostsAttribute()
    // {
    //     return \App\Models\Post::take($this->__get("limit") ?? 9999)->get();
    // }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make("Title"),
            MultiSelect::make("Languages", "languages_ids")->options(
                \App\Models\Language::all()
                    ->pluck("name", "id")
                    ->toArray()
            ),
        ];
    }

    public function getLanguagesAttribute()
    {
        return \App\Models\Language::find($this->__get("languages_ids"));
    }
}
