<?php

namespace App\Nova\Flexible\Layouts;

use Manogi\Tiptap\Tiptap;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextWithSectionNavigation extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "text-with-section-navigation";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Text With Section Navigation";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    public function getSectionNavigationAttribute()
    {
        return [
            "parent" => $this->model->parent ?? $this->model,
            "children" => $this->model->parent
                ? $this->model->parent->children
                : $this->model->children,
        ];
    }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Tiptap::make("Main")->buttons([
                "bold",
                "italic",
                "link",
                "blockquote",
            ]),
        ];
    }
}
