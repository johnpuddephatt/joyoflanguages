<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Number;

class LatestPosts extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "latest-posts";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Latest posts";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    // Define your accessors here
    public function getPostsAttribute()
    {
        return \App\Models\Post::take($this->__get("limit") ?? 9999)->get();
    }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [Number::make("Limit")];
    }
}
