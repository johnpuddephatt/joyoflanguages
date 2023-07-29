<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Fields\Heading;
// use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;
use Laravel\Nova\Fields\Select;

class TextWithLinks extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "text-with-links";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Text with links";

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
            Heading::make("Text"),
            Tiptap::make("Description")->buttons([
                "italic",
                "bold",
                "link",
                "blockquote",
            ]),
            Heading::make("Links"),
            // SimpleRepeatable::make("Links", "links", [
            //     Select::make("Page")
            //         ->options(\App\Models\Page::pluck("title", "id"))
            //         ->placeholder("Select a page"),
            // ])->addRowLabel("Add new link"),
        ];
    }
}
