<?php
namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Manogi\Tiptap\Tiptap;

class PageIntroduction extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "page-introduction";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Page introduction";

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
            Tiptap::make("Content")
                ->stacked()
                ->buttons(["bold", "italic", "link"])
                ->withMeta([
                    "extraAttributes" => [
                        "placeholder" => "Start writing...",
                    ],
                ]),
        ];
    }
}
