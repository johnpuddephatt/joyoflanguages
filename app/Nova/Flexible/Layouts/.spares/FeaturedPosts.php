<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Number;

class FeaturedPosts extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "featured-posts";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Featured posts";

    // Define your accessors here
    public function getPostsAttribute()
    {
        return \App\Models\Post::skip($this->__get("skip") ?? 0)
            ->take($this->__get("limit") ?? 3)
            ->get();
    }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [Number::make("Skip"), Number::make("Limit")];
    }
}
