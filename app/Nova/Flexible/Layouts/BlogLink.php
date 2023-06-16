<?php
namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Select;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Manogi\Tiptap\Tiptap;

class BlogLink extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "blog-link";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Blog link";

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
    public function fields()
    {
        return [
            Select::make("Post", "post_id")
                ->options(
                    \App\Models\Post::all()
                        ->pluck("title", "id")
                        ->toArray()
                )
                ->displayUsingLabels()
                ->stacked()
                ->rules("required"),
        ];
    }

    public function getPostAttribute()
    {
        return \App\Models\Post::find($this->__get("post_id"));
    }
}
