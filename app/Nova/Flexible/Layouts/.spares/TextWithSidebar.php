<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Heading;
use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Fields\Text;
use Trin4ik\NovaSwitcher\NovaSwitcher;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextWithSidebar extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "text-with-sidebar";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Text With Sidebar";

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
            NovaSwitcher::make("Reverse"),
            Heading::make("Main"),
            Tiptap::make("Main")->buttons([
                "bold",
                "italic",
                "link",
                "blockquote",
            ]),
            Heading::make("Sidebar"),
            Text::make("Sidebar title"),
            Tiptap::make("Sidebar")->buttons(["bold", "italic", "link"]),
        ];
    }
}
