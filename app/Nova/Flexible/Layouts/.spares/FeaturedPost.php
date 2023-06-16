<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Number;

class FeaturedPost extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "featured-post";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Featured post";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    // Define your accessors here
    public function getPostAttribute()
    {
        return \App\Models\Post::skip($this->__get("skip") ?? 0)->first();
    }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [Number::make("Skip")];
    }
}
